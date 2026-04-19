<?php

class FormComplex extends TPage
{
    protected $form;
    protected $datagrid;

    public function __construct($param)
    {
        parent::__construct();

        $a = new TEntry('a');
        $b = new TEntry('b');
        $c = new TEntry('c');
        $d = new TEntry('d');
        $e = new THtmlEditor('deskripsi');
        $e->setSize("100%", 170);
        $f = new TText('test');
        $g = new TFile('file');

        $step = new TArrowStep('step');
        $step->addItem('Step 1', 1, '#fa7d00');
        $step->addItem('Step 2', 2, '#0d9ddb');
        $step->addItem('Step 3', 3, '#0fd927');
        $step->setCurrentKey(1);
        $step->setHeight(40);

        $uniq = new THidden('uniq[]');
        $combo = new TCombo('combo[]');
        $combo->enableSearch();
        $combo->addItems(['1' => '<b>One</b>', '2' => '<b>Two</b>', '3' => '<b>Three</b>', '4' => '<b>Four</b>', '5' => '<b>Five</b>']);
        $combo->setSize('100%');

        $text = new TEntry('text[]');
        $text->setSize('100%');

        $number = new TEntry('number[]');
        $number->setNumericMask(2, ',', '.', true);
        $number->setSize('100%');
        $number->style = 'text-align: right';

        $date = new TDate('date[]');
        $date->setSize('100%');

        $menu = KMenuBuilder::make()
            ->schema([
                KTextMenu::make('Quick Actions'),
                KSeparatorMenu::make(),
                KLinkMenu::make('New Ticket')->action([$this, "onAction1"], ["key" => 1]),
                KLinkMenu::make('New Customer')->action([$this, "onAction1"], ["key" => 1]),
                KSubMenu::make('New Group')
                    ->schema([
                        KLinkMenu::make('Admin Group')->action([$this, "onAction1"], ["key" => 1]),
                        KLinkMenu::make('Staff Group')->action([$this, "onAction1"], ["key" => 1]),
                        KLinkMenu::make('Member Group')->action([$this, "onAction1"], ["key" => 1]),
                        KSubMenu::make('Activity Group')
                            ->schema([
                                KLinkMenu::make('Person')->action([$this, "onAction1"], ["key" => 1]),
                                KLinkMenu::make('Staff')->action([$this, "onAction1"], ["key" => 1]),
                            ]),
                    ]),
                KLinkMenu::make('New Contact')->action([$this, "onAction1"], ["key" => 1]),
                KSeparatorMenu::make(),
                KButtonMenu::make("Generate Reports")->action([$this, "onAction1"], ["key" => 1]),
            ])
            ->class('w-200px', 'append');

        $menuBaru = KMenuBuilder::make()
            ->class("menu menu-column menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary mb-10", 'replace')
            ->schema([
                KTextMenu::make('Quick Actions'),
                KSeparatorMenu::make(),
                KLinkMenu::make('New Ticket')->action([$this, "onAction1"], ["key" => 1]),
                KLinkMenu::make('New Customer')->action([$this, "onAction1"], ["key" => 1]),
            ]);

        $menuSticky = KMenuBuilder::make()
            ->schema([
                KLinkMenu::make('Pause Subcription')->action([$this, "onAction1"], ["key" => 1]),
                KLinkMenu::make('Edit Subcription')->action([$this, "onAction1"], ["key" => 1]),
                KLinkMenu::make('Cancel Subcription')->action([$this, "onAction1"], ["key" => 1]),
            ])
            ->class('w-200px', 'append');

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

        $accordion = KAccordion::make()
            ->class('accordion accordion-icon-toggle')
            ->schema([
                KAccordionItem::make()
                    ->header("Accordion 1")
                    ->toolbar([
                        KAction::make('')
                            ->class("btn btn-icon btn-active-light-primary w-30px h-30px me-3")
                            ->image(KIcon::make("pencil")->class("fs-3")),
                        KAction::make('')
                            ->class("btn btn-icon btn-active-light-primary w-30px h-30px me-3")
                            ->image(KIcon::make("trash")->class("fs-3")),
                        KAction::make('')
                            ->class("btn btn-icon btn-active-light-primary w-30px h-30px me-3")
                            ->image(KIcon::make("setting-3")->class("fs-3")),

                    ])
                    ->schema(["This is body"]),
                KSeparatorMenu::make()->class("separator separator-dashed"),
                KAccordionItem::make()
                    ->header("Accordion 2")
                    ->toolbar([
                        KAction::make('')
                            ->class("btn btn-icon btn-active-light-primary w-30px h-30px me-3")
                            ->image(KIcon::make("pencil")->class("fs-3")),
                        KAction::make('')
                            ->class("btn btn-icon btn-active-light-primary w-30px h-30px me-3")
                            ->image(KIcon::make("trash")->class("fs-3")),
                        KAction::make('')
                            ->class("btn btn-icon btn-active-light-primary w-30px h-30px me-3")
                            ->image(KIcon::make("setting-3")->class("fs-3")),

                    ])
                    ->schema([
                        $xtable
                    ]),
                KSeparatorMenu::make()->class("separator separator-dashed"),
            ]);

        $dateRange = KDateRange::make()
            ->image(KIcon::make('calendar-8')->class("text-gray-500 lh-0 fs-2x ms-2 me-0"))
            ->placeholder('Pick date range');


        $carousel = KCarousel::make("Title")
            ->schema([
                KCarouselItem::make()->schema(["Content A"]),
                KCarouselItem::make()->schema(["Content B"]),
                KCarouselItem::make()->schema(["Content C"]),
            ]);

        $switchbutton = new KCheckButton('check3');
        $switchbutton->setLabel("Allowed");

        $radioButton = KRadioAdvanced::make("plan")
            ->data([
                    ['plan' => 'startup', 'title' => 'Startup', 'description' => 'Best for startups', 'price' => '39', 'period' => 'Mon'],
                    ['plan' => 'advanced', 'title' => 'Advanced', 'description' => 'Best for 100+ team size', 'price' => '139', 'period' => 'Mon', 'checked' => true, 'badge' => 'Most popular'],
                    ['plan' => 'enterprise', 'title' => 'Enterprise', 'description' => 'Best value for 1000+ team', 'price' => '339', 'period' => 'Mon']
            ])
            ->setValue("advanced")
            ->switchDisplay(
                template: <<<HTML
                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex flex-stack text-start p-6 mb-5 {active}">
                        <div class="d-flex align-items-center me-2">
                            <div class="form-check form-check-custom form-check-solid form-check-primary me-6">
                                <input class="form-check-input" type="radio" name="plan" value="{plan}"/>
                            </div>
                            <div class="flex-grow-1">
                                <h2 class="d-flex align-items-center fs-3 fw-bold flex-wrap">
                                    {title}                                  
                                </h2>
                                <div class="fw-semibold opacity-50">
                                    {description}
                                </div>
                            </div>
                        </div>
                        <div class="ms-5">
                            <span class="mb-2">$</span>
                            <span class="fs-2x fw-bold">
                                {price}
                            </span>
                            <span class="fs-7 opacity-50">/
                                <span data-kt-element="period">{period}</span>
                            </span>
                        </div>
                        {$switchbutton}
                    </label>
                HTML
            );

        $this->form = KContainer::make("form_custom")
            ->schema([
                KContainerRow::make()
                    ->class("row")
                    ->schema([
                        KCardGroup::make()
                            ->class("col-lg-9")
                            ->schema([
                                KCard::make("PROGRESS", "Menjelaskan tentang progress")
                                    ->toolbar([
                                        KCardToolbar::make()
                                            ->schema([
                                                KAction::make('Edit')
                                                    ->trigger($menu)
                                                    ->image(KIcon::make("file")->class("fs-2x")),
                                                KAction::make('Delete')
                                                    ->action([$this, "onAction1"], ["key" => 1])
                                                    ->image(KIcon::make("trash")->class("fs-2x"))
                                            ])
                                    ])
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make($step)],
                                                [KFieldSet::make($radioButton)],
                                            ]),
                                    ]),
                                KCard::make("Customer Details", "Masukan data terbaru")
                                    ->collapsible('true')
                                    ->schema([
                                        KFieldRow::make()
                                            ->class("row mb-6")
                                            ->schema([
                                                [
                                                    KFieldSet::make(new TLabel('Nama Peserta'))
                                                        ->maxLength()
                                                        ->required()
                                                        ->disabled()
                                                        ->class('col-sm-2'),
                                                    KFieldSet::make($a)->class('col-sm-4'),
                                                    KFieldSet::make(new TLabel('Range Date'))->class('col-sm-2'),
                                                    KFieldSet::make($dateRange)->class('col-sm-4')

                                                ],
                                                [
                                                    KFieldSet::make(new TLabel('No. Induk'))->class('col-sm-2'),
                                                    KFieldSet::make($b)->class('col-sm-4'),
                                                    KFieldSet::make(new TLabel('KTP'))->class('col-sm-2'),
                                                    KFieldSet::make($c)->class('col-sm-4')
                                                ],
                                                [KFieldSet::make(new TLabel('Alamat'))->class('col-sm-2'), KFieldSet::make($d)->class('col-sm-10')],
                                                [KFieldSet::make(new TLabel('Deskripsi'))],
                                                [KFieldSet::make($e)->columnSpan('col-lg-12')],
                                            ]),
                                    ])
                                    ->makeform("formtiket")
                                    ->footer([
                                        KAction::make('Edit')->action([$this, "onAction1"], ["key" => 1]),
                                        KAction::make('Delete')->action([$this, "onAction1"], ["key" => 1]),
                                    ]),
                            ]),
                        KCardGroup::make()
                            ->class("col-lg-3")
                            ->schema([
                                KCard::make("Basic Example")
                                    ->toolbar([
                                        KCardToolbar::make()
                                            ->schema([
                                                KAction::make('')
                                                    ->class("btn btn-sm btn-light btn-icon")
                                                    ->trigger($menuSticky)
                                                    ->image(KIcon::make("dots-horizontal")->class("fs-3x"))
                                            ])
                                    ])
                                    ->sticky(true)
                                    ->class("card card-flush bg-light mb-0")
                                    ->columns(2)
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make($menuBaru)],
                                            ]),
                                    ]),
                            ]),
                    ]),
                KContainerRow::make()
                    ->class('row')
                    ->schema([
                        KCardGroup::make()
                            ->class("col-lg-9")
                            ->schema([
                                KCard::make("TAB", "Uji coba tab builder")
                                    ->ribbon(
                                        header: "ribbon ribbon-end",
                                        label: "ribbon-label bg-primary",
                                        content: "Premium"
                                    )
                                    ->schema([
                                        KTabBuilder::make()
                                            ->type('linetabs')
                                            ->schema([
                                                KTab::make('Overview')
                                                    ->image(KIcon::make("car")->class("fs-1"))
                                                    ->schema([
                                                        KFieldRow::make()
                                                            ->schema([
                                                                [KFieldSet::make(new TLabel("Persen")), KFieldSet::make($f)]
                                                            ])
                                                    ]),
                                                KTab::make('General Settings')
                                                    ->image(KIcon::make("bitcoin")->class("fs-1"))
                                                    ->schema([
                                                        KFieldRow::make()
                                                            ->schema([
                                                                [KFieldSet::make('B'), KFieldSet::make('B'), KFieldSet::make('B')]
                                                            ])
                                                    ]),
                                                KTab::make('Advanced Settings')->image(KIcon::make("like")->class("fs-1")),
                                                KTabMenu::make('Settings')
                                                    ->image(KIcon::make("car")->class("fs-1"))
                                                    ->schema([
                                                        KTabLink::make('Link 4')
                                                            ->schema([
                                                                KFieldRow::make()
                                                                    ->schema([
                                                                        [KFieldSet::make($g)]
                                                                    ])
                                                            ]),
                                                        KTabLink::make('Link 5'),
                                                    ])
                                            ])
                                    ])
                            ])
                    ]),
                KContainerRow::make()
                    ->class('row')
                    ->schema([
                        KCardGroup::make()
                            ->class("col-lg-4")
                            ->schema([
                                KCard::make('PRODUCT')
                                    ->collapsible('true')
                                    //->style("background-color: #F1416C;background-image:url('app/templates/metronic/media/patterns/vector-1.png')")
                                    ->columns(2)
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make($carousel)],
                                            ]),
                                    ]),
                            ]),
                        KCardGroup::make()
                            ->class("col-lg-4")
                            ->schema([
                                KCard::make('Payment Methods')
                                    ->collapsible('true')
                                    ->columns(2)
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make($accordion)],
                                            ]),
                                    ]),
                            ]),
                        KCardGroup::make()
                            ->class("col-lg-4")
                            ->schema([
                                KCard::make('Details')
                                    ->collapsible('true')
                                    ->columns(2)
                                    ->schema([
                                        KFieldRow::make()
                                            ->schema([
                                                [KFieldSet::make($xtable)],
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);

        // Fields automatically tracked by KContainer


        $btn = $this->form->addAction('Save', new TAction([$this, 'onSave']), 'ki-save-2');
        $btn->class = 'btn btn-default btn-primary';

        $btn = $this->form->addAction('Cancel', new TAction([$this, 'onSave']), 'ki-save-2');
        $btn->class = 'btn btn-default btn-secondary';

        parent::add($this->form);
    }

    public function onEdit($param)
    {
        $object = new stdClass();
        $object->a = "Taufik Rahman";
        $object->b = "N200907210";
        $object->c = "123123123123123123";
        $object->d = "Jakarta";
        $object->deskripsi = "Halooo";
        $this->form->setData($object);
    }

    public function onTotalUpdate()
    {
    }

    public function onAction1()
    {
    }

    public function onAction2()
    {
    }

    public function onSave($param)
    {
        var_dump($param);
    }
}
