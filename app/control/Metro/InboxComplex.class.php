<?php

use Adianti\Widget\Datagrid\KDataGrid;
use Adianti\Widget\Datagrid\KDataGridAction;
use Adianti\Widget\Datagrid\KDataGridColumn;

class InboxComplex extends \Adianti\Control\TPage
{
    private $form;
    private $datagrid;
    private $pageNavigation;

    public function __construct($param)
    {
        parent::__construct();

        $this->datagrid = new KDataGrid();
        $this->datagrid->class = "table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3 dataTable";

        $this->pageNavigation = new TPageNavigation();
        $this->createDataGrid($param);

        $menu = KMenuBuilder::make()
            ->class("menu menu-column menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary mb-10", 'replace')
            ->schema([
                KButtonMenu::make("New Message")
                    ->action([$this, "onAction1"], ["key" => 1])
                    ->class("btn btn-primary fw-bold w-100 mb-8"),
                KSeparatorMenu::make(),
                KLinkMenu::make('Inbox')
                    ->action([$this, "onAction1"], ["key" => 1])
                    ->image(KIcon::make("sms")->class("fs-2x"))
                    ->badge('badge-light-success', '2'),
                KLinkMenu::make('Marked')
                    ->image(KIcon::make("notification")->class("fs-2x"))
                    ->action([$this, "onAction1"], ["key" => 1]),
                KLinkMenu::make('Draft')
                    ->image(KIcon::make("file")->class("fs-2x"))
                    ->action([$this, "onAction1"], ["key" => 1])
                    ->badge('badge-light-warning', '5')
                ,
                KLinkMenu::make('Sent')
                    ->image(KIcon::make("send")->class("fs-2x"))
                    ->action([$this, "onAction1"], ["key" => 1]),
                KLinkMenu::make('Trash')
                    ->image(KIcon::make("trash")->class("fs-2x"))
                    ->action([$this, "onAction1"], ["key" => 1]),
                KSeparatorMenu::make()
            ]);

        $form = new KContainer();
        $this->form = $form::make('form_inbox')
            ->schema(
                [
                    KContainerRow::make()
                        ->class("row mb-10")
                        ->schema([
                            KCardGroup::make('')
                                ->class("col-lg-3")
                                ->schema([
                                    KCard::make()
                                        ->class("card card-flush mb-0")
                                        ->schema([
                                            KFieldSet::make($menu),
                                        ])
                                ])
                            ,
                            KCardGroup::make()
                                ->class("col-lg-9")
                                ->schema([
                                    KCard::make()
                                        ->class("card card-flush mb-0")
                                        ->schema([
                                            KFieldSet::make(KIcon::make("arrows-circle")->class("fs-3 m-0"))->class("btn btn-sm btn-icon btn-light btn-active-light-primary mb-2"),
                                            KFieldSet::make(KIcon::make("sms")->class("fs-3 m-0"))->class("btn btn-sm btn-icon btn-light btn-active-light-primary mb-2"),
                                            KFieldSet::make(KIcon::make("trash")->class("fs-3 m-0"))->class("btn btn-sm btn-icon btn-light btn-active-light-primary mb-2"),
                                            KFieldSet::make(KIcon::make("down")->class("fs-3 m-0"))->class("btn btn-sm btn-icon btn-light btn-active-light-primary mb-2"),
                                            KFieldSet::make(KIcon::make("dots-square")->class("fs-3 m-0"))->class("btn btn-sm btn-icon btn-light btn-active-light-primary mb-2"),
                                            KFieldSet::make($this->datagrid),
                                            KFieldSet::make($this->pageNavigation),
                                        ])
                                ])
                        ])

                ]
            );


        parent::add($this->form);
    }

    private function createDataGrid($param)
    {
        // Define the columns for DataGrid3
        $column1 = new KDataGridColumn('id', 'ID', 'center', 50);
        $column2 = new KDataGridColumn('city', 'City', 'left', 200);
        $column3 = new KDataGridColumn('population', 'Population', 'right', 100);

        // Add columns to DataGrid3
        $this->datagrid->addColumn($column1);
        $this->datagrid->addColumn($column2);
        $this->datagrid->addColumn($column3);

        $column1->setTransformer([$this, 'formatRow']);

        $column2->setTransformer(function ($value) {
            if ($value) {
                return
                    <<<EOD
                    <div class="text-gray-900 gap-1 pt-2 fw-bold">                            
                        {$value}
                    </div>
                   EOD;
            }
        });

        $action1 = new KDataGridAction([$this, 'onSelect'], ['id' => '{id}', 'register_state' => 'false']);

        // add the actions to the datagrid
        $this->datagrid->addAction($action1, 'Select', 'ki-abstract-28 fa-fw black');

        // Create the data source for DataGrid3
        $data = [];
        for ($i = 1; $i <= 30; $i++) {
            $data[] = (object)['id' => $i, 'city' => 'City ' . $i, 'population' => rand(10000, 1000000)];
        }

        // Populate DataGrid3 with pagination
        $this->datagrid->createModel();
        $this->populateDataGrid($this->datagrid, $data, $this->pageNavigation, 'page1', $param);
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

    public function onSelect($param)
    {

        // get the selected objects from session
        $selected_objects = TSession::getValue(__CLASS__ . '_selected_objects');
        TSession::setValue(__CLASS__ . '_selected_objects', $selected_objects); // put the array back to the session
        // reload datagrids
        $this->onReload(func_get_arg(0));

    }

    public function onReload($param = NULL)
    {


    }

    public function formatRow($value, $object, $row)
    {
        $selected_objects = TSession::getValue(__CLASS__ . '_selected_objects');

        if ($selected_objects) {
            if (in_array((int)$value, array_keys($selected_objects))) {
                $row->style = "background: #abdef9";

                $button = $row->find('i', ['class' => 'far fa-square fa-fw black'])[0];

                if ($button) {
                    $button->class = 'far fa-check-square fa-fw black';
                }
            }
        }

        return $value;
    }

    public function onAction1()
    {

    }

}

?>