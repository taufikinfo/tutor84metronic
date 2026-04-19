<?php

use Adianti\Control\TPage;
use Adianti\Control\TAction;
use Adianti\Widget\Form\TEntry;
use Adianti\Widget\Form\TCombo;
use Adianti\Widget\Form\TDate;
use Adianti\Widget\Form\TLabel;
use Adianti\Widget\Dialog\TMessage;
use Adianti\Widget\Dialog\TToast;
use Adianti\Widget\Base\TScript;
use Adianti\Database\TTransaction;

/**
 * PerangkatForm
 */
class PerangkatForm extends TPage
{
    protected $form;

    public function __construct($param = null)
    {
        parent::__construct();

        // Create the form fields
        $id = new TEntry('id');
        $id->setEditable(false);

        $kode_barang = new TEntry('kode_barang');
        $nama_barang = new TEntry('nama_barang');
        $merek = new TEntry('merek');

        $kondisi = new TCombo('kondisi');
        $kondisi->addItems(['Baik' => 'Baik', 'Rusak Ringan' => 'Rusak Ringan', 'Rusak Berat' => 'Rusak Berat']);

        $nup = new TEntry('nup');
        $tgl_perolehan = new TDate('tgl_perolehan');
        $tgl_perolehan->setMask('yyyy-mm-dd');
        $tgl_perolehan->setDatabaseMask('yyyy-mm-dd');

        $nilai_perolehan = new TEntry('nilai_perolehan');
        $status = new TCombo('status');
        $status->addItems(['Open' => 'Open', 'On Progress' => 'On Progress', 'Verification' => 'Verification', 'Close' => 'Close']);

        $this->form = KContainer::make("form_perangkat")
            ->schema([
                KContainerRow::make()->class("row")->schema([
                    KCardGroup::make(
                        [
                            KCard::make("Edit Perangkat", "Ubah detail perangkat pada Grid Showcase", [
                                KFieldRow::make([
                                    KField::make('ID', $id)->col(2, 4),
                                    KField::make('Kode Barang', $kode_barang)->col(2, 4),
                                ]),
                                KFieldRow::make([
                                    KField::make('Nama Barang', $nama_barang)->col(2, 10),
                                ]),
                                KFieldRow::make([
                                    KField::make('Merek', $merek)->col(2, 4),
                                    KField::make('Kondisi', $kondisi)->col(2, 4),
                                ]),
                                KFieldRow::make([
                                    KField::make('NUP', $nup)->col(2, 4),
                                    KField::make('Tgl Perolehan', $tgl_perolehan)->col(2, 4),
                                ]),
                                KFieldRow::make([
                                    KField::make('Nilai Perolehan', $nilai_perolehan)->col(2, 4),
                                    KField::make('Status', $status)->col(2, 4),
                                ])
                            ])
                            ->makeform("form_perangkat")
                            ->footer([
                                KAction::make('Save')->action([$this, "onSave"], ["key" => 1])->form("form_perangkat")->useSpinner()->image(KIcon::make('save-2')->class("fs-2"))->class("btn btn-primary me-2"),
                                KAction::make('Cancel')->action(['GridPerangkat', "onReload"], ["key" => 1])->useBackdrop()->image(KIcon::make('cross')->class("fs-2"))->class("btn btn-secondary"),
                            ])
                        ]
                    )->class("col-lg-12")
                ])
            ]);

        parent::add($this->form);
    }

    public function onEdit($param)
    {
        try {
            if (isset($param['key'])) {
                $id = $param['key'];
                TTransaction::open('app');
                $object = new Perangkat($id);

                $this->form->setData($object);
                TTransaction::close();
            }
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }

    public function onSave($param)
    {
        try {
            TTransaction::open('app');
            $data = $this->form->getData();
            $object = new Perangkat;
            $object->fromArray((array) $data);
            $object->store();
            TTransaction::close();

            $this->form->setData($data);

            TToast::show('success', 'Perangkat saved successfully', 'topRight', 'ki-check-circle');
            AdiantiCoreApplication::loadPage('GridPerangkat');
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
            TTransaction::rollback();
        }
    }
}
