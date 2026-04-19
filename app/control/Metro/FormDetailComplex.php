<?php

class FormDetailComplex extends \Adianti\Control\TPage
{
    private $form;

    public function __construct()
    {
        parent::__construct();


        $xtable = KTable::make()
            ->class("table table-flush fw-semibold gy-1")
            ->attr("data", "1")
            ->schema([
                KTableBody::make()
                    ->schema([
                        KTableRow::make()
                            ->schema([
                                KTableData::make("Name")->class("text-muted min-w-125px w-125px"),

                                KTableData::make("Emma Smith")->class("text-gray-800"),
                            ]),
                        KTableRow::make()
                            ->schema([
                                KTableData::make("Number")->class("text-muted min-w-125px w-125px"),
                                KTableData::make("**** 3900")->class("text-gray-800"),
                            ]),
                        KTableRow::make()
                            ->schema([
                                KTableData::make("Expires")->class("text-muted min-w-125px w-125px"),
                                KTableData::make("12/2024")->class("text-gray-800"),
                            ]),
                        KTableRow::make()
                            ->schema([
                                KTableData::make("Type")->class("text-muted min-w-125px w-125px"),
                                KTableData::make("Mastercard credit card")->class("text-gray-800"),
                            ])
                    ])
            ]);


        // Define a function to generate the HTML for each item
        $ouput = null;

        // Example data (this would normally come from your database)
        $data = [
            (object)['logo' => 'app/templates/metronic/media/svg/brand-logos/atica.svg', 'title' => 'Abstergo Ltd.', 'category' => 'Community', 'number' => '579', 'trend_class' => 'success', 'trend_direction' => 'up', 'trend_percentage' => '2.6'],
            (object)['logo' => 'app/templates/metronic/media/svg/brand-logos/telegram-2.svg', 'title' => 'Binford Ltd.', 'category' => 'Social Media', 'number' => '2,588', 'trend_class' => 'danger', 'trend_direction' => 'down', 'trend_percentage' => '0.4'],
            (object)['logo' => 'app/templates/metronic/media/svg/brand-logos/balloon.svg', 'title' => 'Barone LLC.', 'category' => 'Messanger', 'number' => '794', 'trend_class' => 'success', 'trend_direction' => 'up', 'trend_percentage' => '0.2'],
            (object)['logo' => 'app/templates/metronic/media/svg/brand-logos/kickstarter.svg', 'title' => 'Abstergo Ltd.', 'category' => 'Video Channel', 'number' => '1,578', 'trend_class' => 'success', 'trend_direction' => 'up', 'trend_percentage' => '4.1'],
            (object)['logo' => 'app/templates/metronic/media/svg/brand-logos/vimeo.svg', 'title' => 'Biffco Enterprises', 'category' => 'Social Network', 'number' => '3,458', 'trend_class' => 'success', 'trend_direction' => 'up', 'trend_percentage' => '8.3'],
            (object)['logo' => 'app/templates/metronic/media/svg/brand-logos/plurk.svg', 'title' => 'Big Kahuna Burger', 'category' => 'Social Network', 'number' => '2,047', 'trend_class' => 'success', 'trend_direction' => 'up', 'trend_percentage' => '1.9']
        ];

        // Generate and output the HTML for each item
        foreach ($data as $item) {
            $ouput .= $this->generateItemHtml($item);
        }


        $output2 = null;
        $data2 = [
            (object) ['img_src' => 'app/templates/metronic/media/stock/food/img-2.jpg', 'title' => 'T-Bone Steak', 'cook_time' => '16 mins to cook', 'price' => '$16.50'],
            (object) ['img_src' => 'app/templates/metronic/media/stock/food/img-7.jpg', 'title' => 'Chef’s Salmon', 'cook_time' => '16 mins to cook', 'price' => '$12.40'],
            (object) ['img_src' => 'app/templates/metronic/media/stock/food/img-8.jpg', 'title' => 'Ramen', 'cook_time' => '16 mins to cook', 'price' => '$14.90'],
            (object) ['img_src' => 'app/templates/metronic/media/stock/food/img-4.jpg', 'title' => 'Chicken Breast', 'cook_time' => '16 mins to cook', 'price' => '$9.00'],
            (object) ['img_src' => 'app/templates/metronic/media/stock/food/img-10.jpg', 'title' => 'Tenderloin Steak', 'cook_time' => '16 mins to cook', 'price' => '$19.00'],
            (object) ['img_src' => 'app/templates/metronic/media/stock/food/img-9.jpg', 'title' => 'Soup of the Day', 'cook_time' => '16 mins to cook', 'price' => '$7.50'],
            (object) ['img_src' => 'app/templates/metronic/media/stock/food/img-3.jpg', 'title' => 'Pancakes', 'cook_time' => '16 mins to cook', 'price' => '$6.50'],
            (object) ['img_src' => 'app/templates/metronic/media/stock/food/img-5.jpg', 'title' => 'Breakfast', 'cook_time' => '16 mins to cook', 'price' => '$8.20'],
            (object) ['img_src' => 'app/templates/metronic/media/stock/food/img-11.jpg', 'title' => 'Sweety', 'cook_time' => '16 mins to cook', 'price' => '$11.40'],
        ];

        $output2  .= '<div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">';

        foreach ($data2 as $item) {
            $output2 .= $this->generateCardHtml2($item);
        }
        $output2 .= '</div>';


        $this->form = KContainer::make("form")
            ->schema([
                KContainerRow::make()
                    ->class("row")
                    ->schema([
                        KCardGroup::make()
                            ->class("flex-column flex-lg-row-auto w-100 w-xl-350px mb-10")
                            ->schema([
                                KCard::make("")
                                    ->class("card mb-5 mb-xl-8")
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make("Max Smith")],
                                                [KSeparatorMenu::make()],
                                            ])
                                    ])
                            ]),
                        KCardGroup::make()
                            ->class("col-lg-8")
                            ->schema([
                                KFieldRow::make()
                                    ->schema([
                                        [
                                            KTabBuilder::make()
                                                ->type('linetabs')
                                                ->schema([
                                                    KTab::make('Overview')
                                                        ->schema([
                                                            KContainerRow::make()
                                                                ->class("row mb-10")
                                                                ->schema([
                                                                    KCardGroup::make()
                                                                        ->class("col-lg-6")
                                                                        ->schema([
                                                                            KCard::make("Reward Points")
                                                                                ->schema([
                                                                                    KFieldSet::make($ouput)
                                                                                ])
                                                                        ]),
                                                                    KCardGroup::make()
                                                                        ->class("col-lg-6")
                                                                        ->schema([
                                                                            KCard::make("")
                                                                                ->class("card bg-info hoverable h-md-100")
                                                                        ]),
                                                                ]),
                                                            KContainerRow::make()
                                                                ->class("row")
                                                                ->schema([
                                                                    KCardGroup::make()
                                                                        ->class("col-lg-12")
                                                                        ->schema([
                                                                            KCard::make("Transaction History")
                                                                                ->schema([
                                                                                    KFieldSet::make($output2)
                                                                                ])

                                                                        ]),

                                                                ])
                                                        ]),
                                                    KTab::make('General Settings')
                                                        ->schema([
                                                            KContainerRow::make()
                                                                ->class("row")
                                                                ->schema([
                                                                    KCardGroup::make()
                                                                        ->class("col-lg-12")
                                                                        ->schema([
                                                                            KCard::make("Profile")
                                                                        ]),
                                                                ]),
                                                            KContainerRow::make()
                                                                ->class("row")
                                                                ->schema([
                                                                    KCardGroup::make()
                                                                        ->class("col-lg-12")
                                                                        ->schema([
                                                                            KCard::make("Address Book")
                                                                        ]),

                                                                ])
                                                        ]),
                                                    KTab::make('Advanced Settings')
                                                        ->schema([
                                                            KContainerRow::make()
                                                                ->class("row")
                                                                ->schema([
                                                                    KCardGroup::make()
                                                                        ->class("col-lg-12")
                                                                        ->schema([
                                                                            KCard::make("Security Details")
                                                                        ]),
                                                                ]),
                                                            KContainerRow::make()
                                                                ->class("row")
                                                                ->schema([
                                                                    KCardGroup::make()
                                                                        ->class("col-lg-12")
                                                                        ->schema([
                                                                            KCard::make("Two Step Authentication")
                                                                        ]),

                                                                ]),
                                                            KContainerRow::make()
                                                                ->class("row")
                                                                ->schema([
                                                                    KCardGroup::make()
                                                                        ->class("col-lg-12")
                                                                        ->schema([
                                                                            KCard::make("Payment Methods")
                                                                        ]),

                                                                ])
                                                        ]),

                                                ])
                                        ]
                                    ])
                            ]),

                    ])
            ]);

        parent::add($this->form);
    }

    public function generateItemHtml($item)
    {
        return <<<HTML
    <div class="d-flex flex-stack">
        <div class="d-flex align-items-center me-5">
            <img src="{$item->logo}" class="me-4 w-30px" style="border-radius: 4px" alt="">
            <div class="me-5">
                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">{$item->title}</a>
                <span class="text-gray-500 fw-semibold fs-7 d-block text-start ps-0">{$item->category}</span>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <span class="text-gray-800 fw-bold fs-4 me-3">{$item->number}</span>
            <div class="m-0">
                <span class="badge badge-light-{$item->trend_class} fs-base">
                    <i class="ki-duotone ki-arrow-{$item->trend_direction} fs-5 text-{$item->trend_class} ms-n1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>{$item->trend_percentage}%</span>
            </div>
        </div>
    </div>
    <div class="separator separator-dashed my-3"></div>
    HTML;
    }

    public function generateCardHtml2($item)
    {
        return <<<HTML
    <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
        <div class="card-body text-center">
            <img src="{$item->img_src}" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px" alt="">
            <div class="mb-2">
                <div class="text-center">
                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">{$item->title}</span>
                    <span class="text-gray-500 fw-semibold d-block fs-6 mt-n1">{$item->cook_time}</span>
                </div>
            </div>
            <span class="text-success text-end fw-bold fs-1">{$item->price}</span>
        </div>
    </div>
    HTML;
    }
}
