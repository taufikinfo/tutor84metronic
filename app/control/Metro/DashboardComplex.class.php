<?php

use Adianti\Widget\Datagrid\KDataGrid;
use Adianti\Widget\Datagrid\KDataGridColumn;

class DashboardComplex extends TPage
{

    protected $form;
    private $datagrid1;
    private $datagrid2;
    private $datagrid3;

    private $pageNavigation1;
    private $pageNavigation2;
    private $pageNavigation3;
    private $loaded;

    public function __construct($param)
    {

        parent::__construct();

        // Create the TVBox container
        $vbox = new TVBox();
        $vbox->style = 'width: 100%';

        // Create the DataGrids and PageNavigation
        $this->datagrid1 = new KDataGrid();
        $this->datagrid1->class = "table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3 dataTable";

        $this->datagrid2 = new KDataGrid();
        $this->datagrid2->class = "table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3 dataTable";

        $this->datagrid3 = new KDataGrid();
        $this->datagrid3->class = "table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3 dataTable";

        $this->pageNavigation1 = new TPageNavigation();
        $this->pageNavigation2 = new TPageNavigation();
        $this->pageNavigation3 = new TPageNavigation();

        // Configure and populate DataGrids
        $this->createDataGrid1( $param );
        $this->createDataGrid2( $param );
        $this->createDataGrid3( $param );


        $this->form = KContainer::make("dashboard")
            ->columns("row gx-5 gx-xl-10 mb-xl-10")
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
                                            ->class("")
                                            ->schema([
                                                [KFieldSet::make("69")->class("fs-2hx fw-bold text-white me-2 lh-1 ls-n2")],
                                                [KFieldSet::make("active Project")->class("text-white opacity-50 pt-1 fw-semibold fs-6")],
                                            ]),
                                    ])
                                ,
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->class("")
                                            ->schema([
                                                [KFieldSet::make("367")->class("fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2")],
                                                [KFieldSet::make("active Project")->class("text-gray-500 pt-1 fw-semibold fs-6")],
                                            ]),
                                    ]),

                            ]),
                        KCardGroup::make()
                            ->class("col-lg-3")
                            ->schema([
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->class("")
                                            ->schema([
                                                [
                                                 KFieldSet::make("$")->class("fs-4 fw-semibold text-gray-500 me-1 align-self-start"),
                                                 KFieldSet::make("69,700")->class("fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2")
                                                ],
                                                [KFieldSet::make("Projects Earnings in April")->class("text-gray-500 pt-1 fw-semibold fs-6")],
                                            ]),
                                    ]),
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->class("")
                                            ->schema([
                                                [KFieldSet::make("Highlights")->class("card-title text-gray-800")],

                                            ]),
                                    ]),

                            ]),
                        KCardGroup::make()
                            ->class("col-lg-6")
                            ->schema([
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("<h3>What’s up Today</h3>")->class("card-label fw-bold text-gray-900")],
                                                [KFieldSet::make($this->datagrid1)],
                                                [KFieldSet::make($this->pageNavigation1)],
                                            ])
                                    ])
                            ])
                    ]),
                KContainerRow::make()
                    ->class("row")
                    ->schema([
                        KCardGroup::make()
                            ->class("col-lg-6")
                            ->schema([
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->class("")
                                            ->schema([
                                                [KFieldSet::make("367")->class("fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2")],
                                                [KFieldSet::make("active Project")->class("text-gray-500 pt-1 fw-semibold fs-6")],
                                            ]),
                                    ]),

                            ]),
                        KCardGroup::make()
                            ->class("col-lg-6")
                            ->schema([
                                KCard::make("")
                                    ->style("background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%)")
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("<h3>What’s up Today</h3>")->class("card-label fw-bold text-gray-900")],
                                                [KFieldSet::make("")],
                                            ])
                                    ])


                            ])
                    ]),
                KContainerRow::make()
                    ->class("row")
                    ->schema([
                        KCardGroup::make()
                            ->class("col-lg-4")
                            ->schema([
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->class("")
                                            ->schema([
                                                [KFieldSet::make("367")->class("fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2")],
                                                [KFieldSet::make("active Project")->class("text-gray-500 pt-1 fw-semibold fs-6")],
                                            ]),
                                    ]),

                            ]),
                        KCardGroup::make()
                            ->class("col-lg-8")
                            ->schema([
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("<h3>What’s up Today</h3>")->class("card-label fw-bold text-gray-900")],
                                                [KFieldSet::make($this->datagrid2)],
                                                [KFieldSet::make($this->pageNavigation2)]
                                            ])
                                    ])


                            ])
                    ]),
                KContainerRow::make()
                    ->class("row")
                    ->schema([
                        KCardGroup::make()
                            ->class("col-lg-4")
                            ->schema([
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->class("")
                                            ->schema([
                                                [KFieldSet::make("367")->class("fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2")],
                                                [KFieldSet::make("active Project")->class("text-gray-500 pt-1 fw-semibold fs-6")],
                                            ]),
                                    ]),

                            ]),
                        KCardGroup::make()
                            ->class("col-lg-8")
                            ->schema([
                                KCard::make("")
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("<h3>What’s up Today</h3>")->class("card-label fw-bold text-gray-900")],
                                                [KFieldSet::make($this->datagrid3)],
                                                [KFieldSet::make($this->pageNavigation3)]
                                            ])
                                    ])


                            ])
                    ])

            ]);

        parent::add($this->form);


    }

    private function createDataGrid1($param)
    {
        // Define the columns for DataGrid1
        $column1 = new KDataGridColumn('id', '', 'center', 50);
        $column2 = new KDataGridColumn('name', '', 'left', 200);

        $column1->setTransformer(function ($value) {
            if ($value) {
                return <<<EOD
                        <div class="position-relative ps-6 pe-3 py-2">
                            <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-primary"></div>
                            {$value}
                        </div>
                       EOD;
            }
        });

        // Add columns to DataGrid1
        $this->datagrid1->addColumn($column1);
        $this->datagrid1->addColumn($column2);

        // Create the data source for DataGrid1
        $data = [];
        for ($i = 1; $i <= 30; $i++) {
            $data[] = (object)['id' => $i, 'name' => 'Person ' . $i];
        }

        // Populate DataGrid1 with pagination
        $this->datagrid1->createModel();
        $this->populateDataGrid($this->datagrid1, $data, $this->pageNavigation1, 'page1', $param);
    }


    private function createDataGrid2($param)
    {
        // Define the columns for DataGrid2
        $column1 = new KDataGridColumn('id', 'ID', 'center', 50);
        $column2 = new KDataGridColumn('product', 'Product', 'left', 200);
        $column3 = new KDataGridColumn('price', 'Price', 'right', 100);

        // Add columns to DataGrid2
        $this->datagrid2->addColumn($column1);
        $this->datagrid2->addColumn($column2);
        $this->datagrid2->addColumn($column3);

        $column1->setTransformer(function ($value) {
            if ($value) {
                return <<<EOD
                        <div class="position-relative ps-6 pe-3 py-2">
                            <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-success"></div>
                            {$value}
                        </div>
                       EOD;
            }
        });

        // Create the data source for DataGrid2
        $data = [];
        for ($i = 1; $i <= 30; $i++) {
            $data[] = (object)['id' => $i, 'product' => 'Product ' . $i, 'price' => rand(100, 2000)];
        }

        // Populate DataGrid2 with pagination
        $this->datagrid2->createModel();
        $this->populateDataGrid($this->datagrid2, $data, $this->pageNavigation2, 'page2', $param);
    }

    private function createDataGrid3($param)
    {
        // Define the columns for DataGrid3
        $column1 = new KDataGridColumn('id', 'ID', 'center', 50);
        $column2 = new KDataGridColumn('city', 'City', 'left', 200);
        $column3 = new KDataGridColumn('population', 'Population', 'right', 100);

        // Add columns to DataGrid3
        $this->datagrid3->addColumn($column1);
        $this->datagrid3->addColumn($column2);
        $this->datagrid3->addColumn($column3);

        // Create the data source for DataGrid3
        $data = [];
        for ($i = 1; $i <= 30; $i++) {
            $data[] = (object)['id' => $i, 'city' => 'City ' . $i, 'population' => rand(10000, 1000000)];
        }

        // Populate DataGrid3 with pagination
        $this->datagrid3->createModel();
        $this->populateDataGrid($this->datagrid3, $data, $this->pageNavigation3, 'page3', $param);
    }

    private function populateDataGrid($datagrid, $data, $pageNavigation, $pageParam, $param)
    {

        // Define the current page and the number of items per page
        if (isset($_GET[$pageParam])) {
            $currentPage = isset($param["page"]) ? (int)$param["page"] : 1;
        } else {
            $currentPage = 1;
            $param["page"] = 1;
        }

        $itemsPerPage = 5;
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Slice the data according to the current page and items per page
        $pagedData = array_slice($data, $offset, $itemsPerPage);

        $datagrid->clear();
        // Add items to the DataGrid
        foreach ($pagedData as $item) {
            $datagrid->addItem($item);
        }

        // Configure page navigation
        $pageNavigation->setAction(new TAction([$this, 'onReload'], [$pageParam => '']));
        $pageNavigation->setCount(count($data)); // Set the total number of records
        $pageNavigation->setProperties($param);
        $pageNavigation->setLimit($itemsPerPage);
        $this->loaded = true;

    }

    public function onReload($param = NULL)
    {


    }

    function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded)
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }

}