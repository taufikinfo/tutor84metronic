<?php

use Adianti\Base\KStandardList;
use Adianti\Control\TAction;
use Adianti\Widget\Util\TProgressBar;


ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

class GridComplex extends KStandardList
{
    protected $form;     // registration form
    protected $datagrid; // listing
    protected $pageNavigation;
    protected $formgrid;
    protected $deleteButton;
    protected $transformCallback;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct();
        parent::setDatabase('app');            // defines the database
        parent::setActiveRecord('Tickets');   // defines the active record
        parent::setDefaultOrder('id', 'asc');         // defines the default order

        parent::addFilterField('subject', 'like', 'subject'); // filterField, operator, formField
        parent::addFilterField('product', 'like', 'product'); // filterField, operator, formField
        parent::setLimit(TSession::getValue(__CLASS__ . '_limit') ?? 20);
        parent::setAfterSearchCallback([$this, 'onAfterSearch']);

        // create the form fields
        $subject = new KEntry('subject');
        $product = new KEntry('product');
        $status = new KCombo('status');

        $status->addItems(["Open" => "Open", "Verification" => "Verification", "On Progress" => "On Progress", "Close" => "Close"]);


        $this->form = KContainer::make('form_search_custom')
            ->schema([
                KFieldRow::make()
                    ->class("px-7 py-5 mb-5")
                    ->schema([
                        [KFieldSet::make(new TLabel('Subject')), KFieldSet::make($subject)],
                        [KFieldSet::make(new TLabel('Product')), KFieldSet::make($product)],
                        [KFieldSet::make(new TLabel('Status')), KFieldSet::make($status)],
                    ]),
                KSeparatorMenu::make(),
                KHtml::div()
                    ->class("px-7 py-5")
                    ->schema([
                        KAction::make('Apply')
                            ->action([$this, 'onSearch'])
                            ->form('form_search_custom')
                            ->useSpinner()
                            ->attr('data-kt-menu-dismiss', 'true')
                            ->attr('data-kt-customer-table-filter', 'filter')
                            ->class("btn btn-sm btn-primary me-2"),
                        KAction::make('Cancel')
                            ->action([$this, 'onSearch'])
                            ->form('form_search_custom')
                            ->useSpinner()
                            ->attr('data-kt-menu-dismiss', 'true')
                            ->attr('data-kt-customer-table-filter', 'filter')
                            ->class("btn btn-sm btn-secondary")
                    ])
            ]);

        $this->form->setData(TSession::getValue(__CLASS__ . '_filter_data'));

        $menus = KMenuBuilder::make()
            ->class("w-350px")
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
            );

        $separator = KSeparatorMenu::make();

        $this->datagrid = KGridBuilder::make()
            ->instance($this)
            ->id("customers_table_wrapper")
            ->class("table table-striped table-hover")
            ->style('width: 100%')
            ->schema([
                KGridHeader::make()
                    ->schema([
                        KSearchBox::make(' Pencarian Ticket'),
                    ]),
                KGridToolbar::make()
                    ->schema([
                        KAction::make('Filter Options')
                            ->trigger($menus)
                            ->image(KIcon::make("filter")->class("fs-2")->type("duotone")),
                        KAction::make('Export')
                            ->type("link")
                            ->action([$this, 'onExportXLS'], ['static' => '1'])
                            ->image(KIcon::make("abstract-26")->class("fs-2")->type("duotone")),
                        KAction::make('Add Complaint')
                            ->type("link")
                            ->action([$this, "onShowWindow"], ["static" => "1"])
                            ->image(KIcon::make("message-add")->class("fs-2")->type("duotone")),
                        KHtml::span()
                            ->class("my-0")
                            ->schema([
                                $dropdown
                            ])
                    ]),
                KGridColumns::make($this)
                    ->action([
                        KGridAction::make()
                            ->label("Edit")
                            ->action(["TicketsForm", "onEdit"], ["key" => '{id}', "code" => '{perangkat_id}'])
                            ->image(KIcon::make("file")->class("fs-2")->type("duotone")),
                        KGridAction::make()
                            ->action([$this, "onAction2"], ["key" => '{id}'])
                            ->image(KIcon::make("trash")->class("fs-2")->type("duotone")),
                    ])
                    ->actionGroup(
                        KAction::make('Options')
                            ->class("btn btn-sm btn-light btn-flex btn-center btn-active-light-primary")
                            ->image(KIcon::make("abstract-26")->class("fs-2")->type("duotone"))
                            ->trigger(
                                KMenuBuilder::make()
                                    ->schema([
                                        KLinkMenu::make('Display Ticket')
                                            ->action(["TicketsForm", "onA"], ["key" => '{id}', "code" => "{perangkat_id}"]),
                                        KLinkMenu::make('Modify Ticket')
                                            ->action(["TicketsForm", "onB"], ["key" => '{id}', "code" => "{perangkat_id}"]),
                                        KSeparatorMenu::make(),
                                        KLinkMenu::make('Cancel Ticket')
                                            ->action(["TicketsForm", "onC"], ["key" => '{id}', "code" => "{perangkat_id}"]),
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
                        KTextColumn::make('subject')->label('Subject')->searchable()->sortable(),
                        KTextColumn::make('product')->label('Product')->searchable()->sortable(),
                        KTextColumn::make('status_progress')
                            ->label('Status')
                            ->attr('style', 'font-weight: bold')
                            ->searchable()
                            ->sortable()
                            ->transform(
                                function ($percent) {
                                    $bar = new TProgressBar;
                                    $bar->setMask('<b>{value}</b>% complete');
                                    $bar->setValue( ( (int) $percent/4) * 100  );
                                    if ($percent == 4) {
                                        $bar->setClass('success');
                                    } else if ($percent >= 3) {
                                        $bar->setClass('info');
                                    } else if ($percent >= 2) {
                                        $bar->setClass('warning');
                                    } else {
                                        $bar->setClass('danger');
                                    }
                                    return $bar;
                                }
                            )
                        ,
                        KTextColumn::make('perangkat_id')
                            ->label('Test')
                            ->searchable()
                            ->sortable()
                            ->transform(
                                array($this, 'formatStatus')
                            )

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
                template: <<<HTML
                                 <div class="d-flex align-items-center mb-8">
                                  <!--begin::Bullet-->
                                  <span class="bullet bullet-vertical h-40px bg-success"></span>
                                  <!--end::Bullet-->
                                  <!--begin::Checkbox-->
                                  <div class="form-check form-check-custom form-check-solid mx-5">
                                    <input class="form-check-input" type="checkbox" value="">
                                  </div>
                                  <!--end::Checkbox-->
                                  <!--begin::Description-->
                                  <div class="flex-grow-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">{product}</a>
                                    <span class="text-muted fw-semibold d-block">{subject}</span>
                                  </div>
                                  <!--end::Description-->
                                  <span class="badge badge-light-success fs-8 fw-bold">New</span>
                                </div> 
                            HTML,
                data: ["name"=>"HHDR"]
            )
            ->noDataDisplay(
                title: "Create Ticket Complaint ",
                description: "Click on the below buttons to launch <br> a new API Key creation example",
                content: [
                    KHtml::div()
                        ->class("text-center pb-10")
                        ->schema([
                            KHtml::a()->href('#')->class("btn btn-primary er fs-6 px-8 py-4")->schema(["Create API Key"]),
                        ]),
                    KHtml::div()
                        ->class("text-center px-5")
                        ->schema([
                            KHtml::img()
                                ->class("mw-100 h-200px h-sm-325px")
                                ->src("app/templates/metronic/media/illustrations/sketchy-1/16.png")
                        ]),
                ]
            );

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
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("Product Pegawai")],
                                                [KFieldSet::make(self::getCustomers()->pegawai)->class("fs-2hx fw-bold text-grey me-2 lh-1 ls-n2")],
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

    public static function onShowWindow($param = null)
    {
        try {
            // create a window
            $page = TWindow::create('Filters', 900, null);
            $page->removePadding();

            // instantiate self class, populate filters in construct
            $embed = new self;

            // embed form inside window
            $page->add($embed->form);
            $page->setIsWrapped(true);
            $page->show();
        } catch (Exception $e) {
            new TMessage('error', $e->getMessage());
        }
    }

    public static function closeWindow($param = null)
    {
        TWindow::closeWindow();
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

    public function onAction1()
    {

    }

    public function onAction2()
    {

    }


}