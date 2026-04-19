<?php

use Adianti\Base\KStandardList;
use Adianti\Control\TAction;
use Adianti\Widget\Util\TProgressBar;


ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

class GridPerangkat extends KStandardList
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $formgrid;
    protected $deleteButton;
    protected $transformCallback;

    public function __construct()
    {
        parent::__construct();
        parent::setDatabase('app');            // defines the database
        parent::setActiveRecord('Perangkat');   // defines the active record
        parent::setDefaultOrder('id', 'asc');         // defines the default order

        parent::addFilterField('kode_barang', 'like', 'kode_barang'); // filterField, operator, formField
        parent::addFilterField('nama_barang', 'like', 'nama_barang'); // filterField, operator, formField
        parent::setLimit(TSession::getValue(__CLASS__ . '_limit') ?? 20);
        parent::setAfterSearchCallback([$this, 'onAfterSearch']);

        // create the form fields
        $kode_barang = new KEntry('kode_barang');
        $nama_barang = new KEntry('nama_barang');
        $merek = new KEntry('merek');
        $status = new KCombo('status');

        $status->addItems(["Open" => "Open", "Verification" => "Verification", "On Progress" => "On Progress", "Close" => "Close"]);


        $this->form = KContainer::make('form_search_perangkat')
            ->schema([
                KFieldRow::make()
                    ->class("px-7 py-5 mb-5")
                    ->schema([
                        [KFieldSet::make(new TLabel('Kode Barang'))->class('col-sm-2'), KFieldSet::make($kode_barang)->class('col-sm-4'), KFieldSet::make(new TLabel('Merek'))->class('col-sm-2'), KFieldSet::make($merek)->class('col-sm-4')],
                        [KFieldSet::make(new TLabel('Nama Barang'))->class('col-sm-2'), KFieldSet::make($nama_barang)->class('col-sm-10')],
                        [KFieldSet::make(new TLabel('Status'))->class('col-sm-2'), KFieldSet::make($status)->class('col-sm-4')],
                    ]),
                KSeparatorMenu::make(),
                KHtml::div()
                    ->class("px-7 py-5")
                    ->schema([
                        KAction::make('Apply')
                            ->action([$this, 'onSearch'])
                            ->form('form_search_perangkat')
                            ->useSpinner()
                            ->attr('data-kt-menu-dismiss', 'true')
                            ->attr('data-kt-customer-table-filter', 'filter')
                            ->class("btn btn-sm btn-primary me-2"),
                        KAction::make('Cancel')
                            ->action([$this, 'onSearch'])
                            ->form('form_search_perangkat')
                            ->useSpinner()
                            ->attr('data-kt-menu-dismiss', 'true')
                            ->attr('data-kt-customer-table-filter', 'filter')
                            ->class("btn btn-sm btn-secondary")
                    ])
            ]);

        $this->form->setData(TSession::getValue(__CLASS__ . '_filter_data'));

        $menus = KMenuBuilder::make()
            ->class("w-600px")
            ->schema([
                KTextMenu::make('Quick Actions'),
                KSeparatorMenu::make(),
                $this->form
            ]);


        $dropdown = KAction::make(TSession::getValue(__CLASS__ . '_limit') ?? '10')
            ->class('btn btn-light-primary me-3')
            ->trigger(
                KMenuBuilder::make()
                    ->schema([
                        KLinkMenu::make('5')->action([$this, 'onChangeLimit'], ['register_state' => 'false', 'static' => '1', 'limit' => '5']),
                        KLinkMenu::make('10')->action([$this, 'onChangeLimit'], ['register_state' => 'false', 'static' => '1', 'limit' => '10']),
                        KLinkMenu::make('25')->action([$this, 'onChangeLimit'], ['register_state' => 'false', 'static' => '1', 'limit' => '25']),
                        KLinkMenu::make('50')->action([$this, 'onChangeLimit'], ['register_state' => 'false', 'static' => '1', 'limit' => '50']),
                        KLinkMenu::make('100')->action([$this, 'onChangeLimit'], ['register_state' => 'false', 'static' => '1', 'limit' => '100']),
                    ])
                    ->class('w-100px')
            );

        $this->datagrid = KGridBuilder::make()
            ->id("customers_table_wrapper")
            ->instance($this)
            ->style('width: 100%')
            ->setGroupColumn('nama_barang', "<b>Grouping</b> {nama_barang} ")
            ->disableDefaultClick()
            ->schema([
                KGridHeader::make()
                    ->schema([
                        KSearchBox::make(' Pencarian Perangkat')
                            ->action([$this, 'onSearchGlobal'])
                    ]),
                KGridToolbar::make()
                    ->schema([
                        KAction::make('Filter Options')
                            ->trigger($menus)
                            ->image(KIcon::make("filter")->class("fs-2")->type("duotone")),
                        KAction::make('Export')
                            ->action([$this, 'onExportXLS'], ['register_state' => 'false', 'static' => '1'])
                            ->image(KIcon::make("abstract-26")->class("fs-2")->type("duotone"))
                        ,
                        KAction::make('Add Perangkat')
                            ->action(["PerangkatForm", "onEdit"], ["key" => 1])
                            ->image(KIcon::make("abstract-26")->class("fs-2")->type("duotone"))
                        ,
                        KHtml::div()
                            ->class("my-0")
                            ->schema([
                                $dropdown
                            ])
                    ]),
                KGridColumns::make($this)
                    ->action([
                        KGridAction::make()
                            ->label("Edit")
                            ->action(["PerangkatForm", "onEdit"], ["key" => '{id}'])
                            ->image(KIcon::make("file")->class("fs-2")->type("duotone")),
                        KGridAction::make()
                            ->action([$this, "onDelete"], ["key" => '{id}'])
                            ->image(KIcon::make("trash")->class("fs-2")->type("duotone")),
                    ])
                    ->actionGroup(
                        KAction::make('Options')
                            ->class("btn btn-sm btn-light btn-flex btn-center btn-active-light-primary")
                            ->image(KIcon::make("abstract-26")->class("fs-2")->type("duotone"))
                            ->trigger(
                                KMenuBuilder::make()
                                    ->schema([
                                        KLinkMenu::make('Edit Perangkat')->action(["PerangkatForm", "onEdit"], ["key" => '{id}']),
                                        KSeparatorMenu::make(),
                                        KLinkMenu::make('Remove Perangkat')->action([$this, "onDelete"], ["key" => '{id}']),
                                    ])
                                    ->class('w-200px')
                            )
                    )
                    ->schema([
                        KTextColumn::make('id')
                            ->attr('style', 'font-weight: bold')
                            ->label('Code')
                            ->searchable()
                            ->sortable()
                            ->transform(
                                function ($value) {
                                    if ($value) {
                                        return <<<EOD
                                        <div class="position-relative ps-6 pe-3 py-2">
                                            <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-primary"></div>
                                            {$value}
                                        </div>
                                        EOD;
                                    }
                                }
                            )
                        ,
                        KTextColumn::make('kode_barang')->label('Kode Barang')->searchable()->sortable(),
                        KTextColumn::make('merek')
                            ->label('Merek')
                            ->searchable()
                            ->sortable(),
                        KTextColumn::make('nama_barang')->label('Nama Barang')->searchable()->sortable(),
                        KTextColumn::make('kondisi')
                            ->label('Status')
                            ->searchable()
                            ->sortable()
                            ->transform(
                                function ($kondisi) {
                                    if ($kondisi == "Baik") {
                                        $style = 'badge-light-success text-success';
                                    } else if ($kondisi == "Rusak Ringan") {
                                        $style = 'badge-light-warning text-warning';
                                    } else {
                                        $style = 'badge-light-danger text-danger';
                                    }
                                    return "<span class='badge {$style} fw-bold px-4 py-3'>{$kondisi}</span>";
                                }
                            )
                        ,
                        KTextColumn::make('nup')
                            ->label('NUP')
                            ->searchable()
                            ->sortable(),

                        KTextColumn::make('tgl_perolehan')
                            ->label('Tgl Perolehan')
                            ->searchable()
                            ->sortable(),
                        KTextColumn::make('nilai_perolehan')
                            ->label('Nilai Perolehan')
                            ->searchable()
                            ->sortable()
                    ]),
                KTableFooter::make()
                    ->schema([
                        KNavigation::make()
                            ->enableCounters()
                            ->setAction(new TAction([$this, 'onReload']))
                            ->setWidth("20px")
                    ])
            ])
            ->switchDisplay(
                cardclass:"no-background",
                template: <<<HTML
                            [if \$kondisi == 'Baik']
                                [var \$bg = 'bg-success']
                            [elseif \$kondisi == 'Rusak Ringan']
                                [var \$bg = 'bg-warning']                           
                            [else]
                                [var \$bg = 'bg-danger']
                            [/if]           
                                            
                            <div class="col-md-6 col-xxl-4">
                                <div class="card border-hover-primary">
                                    <div class="card-body d-flex flex-center flex-column p-9">                                        
                                        <div class="symbol symbol-65px symbol-circle mb-5">                                           
                                            <div class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                                            {nama_barang}
                                        </div>
                                        <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0"> {merek}</a>
                                        
                                        <div class="fw-semibold text-gray-500 mb-6">{kode_barang}</div>    
                                        <div class="fw-semibold text-white-500 mb-6">{kondisi}</div>  
                                                   
                                        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 50% completed" data-bs-original-title="This project 50% completed" data-kt-initialized="1">
                                        <div class="[\$bg] rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>
                                     </div>
                                </div>
                            </div>
                            HTML
            )
            ->bulkActions([
                KActionBulk::make("Delete Selected")
            ]);

        $card = KHtml::div()
            ->schema([
                KContainerRow::make()
                    ->class("row")
                    ->schema([
                        KCardGroup::make()
                            ->class("col-lg-3")
                            ->schema([
                                KCard::make("")
                                    ->style("background-color: #080655")
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("Total Perangkat")->class("text-white")],
                                                [KFieldSet::make(self::getCustomers()->perangkat)->class("fs-2hx fw-bold text-white me-2 lh-1 ls-n2")],
                                            ])
                                    ])

                            ]),
                        KCardGroup::make()
                            ->class("col-lg-3")
                            ->schema([
                                KCard::make("")
                                    ->style("background-color: #7239EA;")
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("Product Pegawai")->class("text-white")],
                                                [KFieldSet::make(self::getCustomers()->pegawai)->class("fs-2hx fw-bold text-white me-2 lh-1 ls-n2")],
                                            ])
                                    ])

                            ]),
                        KCardGroup::make()
                            ->class("col-lg-3")
                            ->schema([
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("Total Ticket")],
                                                [KFieldSet::make(self::getCustomers()->ticket)->class("fs-2hx fw-bold text-grey me-2 lh-1 ls-n2")],
                                            ])
                                    ])

                            ]),
                        KCardGroup::make()
                            ->class("col-lg-3")
                            ->schema([
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("Total Product")],
                                                [KFieldSet::make("560")->class("fs-2hx fw-bold text-grey me-2 lh-1 ls-n2")],
                                            ])
                                    ])

                            ])

                    ])
            ]);

        parent::add($card);
        parent::add($this->datagrid);

    }

    public static function getCustomers()
    {
        try {

            $source = TTransaction::open('app');
            $query = "SELECT count(*) as count FROM perangkat ";
            $query1 = "SELECT count(*) as count FROM pegawai ";
            $query2 = "SELECT count(*) as count FROM tickets ";

            $raw_data = TDatabase::getData($source, $query);
            $raw_data1 = TDatabase::getData($source, $query1);
            $raw_data2 = TDatabase::getData($source, $query2);

            $out = new stdClass();
            $out->perangkat = $raw_data[0]["count"];
            $out->pegawai = $raw_data1[0]["count"];
            $out->ticket = $raw_data2[0]["count"];

            TTransaction::close();

            return $out;
        } catch (Exception $e) {
            // Rollback the transaction in case of an exception
            TTransaction::rollback();
            throw $e;
        }
    }

    public static function onChangeLimit($param)
    {
        TSession::setValue(__CLASS__ . '_limit', $param['limit']);
        AdiantiCoreApplication::loadPage(__CLASS__, 'onReload');
    }

    public function formatStatus($stock, $object, $row)
    {
        $number = number_format($stock, 2, ',', '.');
        if ($stock > 0) {
            return "<span style='color:blue'>$number</span>";
        } else {
            $row->style = "background: #FFF9A7";
            return "<span style='color:red'>$number</span>";
        }

    }

    public function onAfterSearch($datagrid, $options)
    {

    }

    public function onDelete($param = null)
    {
        if (isset($param['delete']) && $param['delete'] == 1) {
            try {
                $id = $param['key'];
                TTransaction::open('app');
                $object = new Perangkat($id);
                $object->delete();
                TTransaction::close();

                TToast::show('success', 'Perangkat berhasil dihapus', 'topRight', 'ki-check-circle');
                $this->onReload();
            } catch (Exception $e) {
                new TMessage('error', $e->getMessage());
                TTransaction::rollback();
            }
        } else {
            $action = new TAction(array($this, 'onDelete'));
            $action->setParameters($param);
            $action->setParameter('delete', 1);

            new TQuestion('Apakah Anda yakin ingin menghapus data perangkat ini?', $action);
        }
    }

    public function onSearchGlobal($param = null)
    {
        $search = $param['search'] ?? '';
        
        // Inject the fast search query directly into the advanced search pipeline
        // by simulating a POST payload for the primary search field.
        $_POST['nama_barang'] = $search;
        $_POST['kode_barang'] = '';
        $_POST['merek'] = '';
        $_POST['status'] = '';

        // Synchronize the advanced filter form UI state and trigger the native search schema
        $this->form->setData((object) $_POST);
        $this->onSearch();
    }

}
