<?php

use Adianti\Control\TPage;

class CustomComplex extends \Adianti\Control\TPage
{
    public function __construct(){

        parent::__construct();
        $menu = KAction::make('Options')
            ->trigger(
                KMenuBuilder::make()
                    ->schema([
                        KLinkMenu::make('Pause Subcription')->action([$this, "onAction1"], ["key" => 1]),
                        KLinkMenu::make('Edit Subcription')->action([$this, "onAction1"], ["key" => 1]),
                        KLinkMenu::make('Cancel Subcription')->action([$this, "onAction1"], ["key" => 1]),
                    ])
                    ->class('w-200px')
            );

        $createMenu = function() use ($menu) {
            return clone $menu;
        };

        // Using the closure to create separate instances
        $a = $createMenu();
        $b = $createMenu();
        $c = $createMenu();

        $page = new \Adianti\Widget\Container\TVBox();
        $page->add($a);
        $page->add($b);
        $page->add($c);

        $data = [
            (object) [
                'icon' => 'ki-message-text-2',
                'title' => 'There are 2 new tasks for you in “AirPlus Mobile App” project:',
                'description' => 'Added at 4:23 PM by',
                'user' => (object) ['name' => 'Nina Nilson', 'avatar' => 'app/templates/metronic/media/avatars/300-14.jpg'],
                'details' => [
                    (object) [
                        'title' => 'Meeting with customer',
                        'label' => 'Application Design',
                        'link' => 'apps/projects/project.html',
                        'avatars' => ['app/templates/metronic/media/avatars/300-2.jpg', 'app/templates/metronic/media/avatars/300-14.jpg'],
                        'progress' => 'In Progress'
                    ],
                    (object) [
                        'title' => 'Project Delivery Preparation',
                        'label' => 'CRM System Development',
                        'link' => 'apps/projects/project.html',
                        'avatars' => ['app/templates/metronic/media/avatars/300-20.jpg'],
                        'progress' => 'Completed'
                    ]
                ]
            ],
            (object) [
                'icon' => 'ki-flag',
                'title' => 'Invitation for crafting engaging designs that speak human workshop',
                'description' => 'Sent at 4:23 PM by',
                'user' => (object) ['name' => 'Alan Nilson', 'avatar' => 'app/templates/metronic/media/avatars/300-1.jpg']
            ],
            (object) [
                'icon' => 'ki-disconnect',
                'title' => '3 New Incoming Project Files:',
                'description' => 'Sent at 10:30 PM by',
                'user' => (object) ['name' => 'Jan Hummer', 'avatar' => 'app/templates/metronic/media/avatars/300-23.jpg'],
                'details' => [
                    (object) [
                        'title' => 'Finance KPI App Guidelines',
                        'link' => 'apps/projects/project.html',
                        'label' => '1.9mb',
                        'avatars' => ['app/templates/metronic/media/svg/files/pdf.svg']
                    ],
                    (object) [
                        'title' => 'Client UAT Testing Results',
                        'link' => 'apps/projects/project.html',
                        'label' => '18kb',
                        'avatars' => ['app/templates/metronic/media/svg/files/doc.svg']
                    ],
                    (object) [
                        'title' => 'Finance Reports',
                        'link' => 'apps/projects/project.html',
                        'label' => '20mb',
                        'avatars' => ['app/templates/metronic/media/svg/files/css.svg']
                    ]
                ]
            ]
        ];



        $timeline = KTimeline::make()->schema($data)->render();



        $stepper = KStepper::make()
            ->class("stepper stepper-pills stepper-column d-flex flex-column flex-lg-row")
            ->schema([
                KStepperItem::make("Step 1", "Description")
                    ->schema([
                        KFieldRow::make()
                            ->class("row")
                            ->schema([
                                [KFieldSet::make("haloo")],
                                [KFieldSet::make("haloo")],
                            ])
                    ]),
                KStepperItem::make("Step 2", "Description")
                    ->schema([
                        // Add components for Step 2
                    ]),
                KStepperItem::make("Step 3", "Description")
                    ->schema([
                        // Add components for Step 3
                    ]),
                KStepperItem::make("Step 4", "Description")
                    ->schema([
                        // Add components for Step 4
                    ]),
            ])
            ->actions(
                previous: KAction::make('Back')
                    ->type("stepper")
                    ->class("btn btn-light btn-active-light-primary")
                    ->attr("data-kt-stepper-action", "previous"),
                next: KAction::make('Continue')
                    ->type("stepper")
                    ->class("btn btn-primary")
                    ->attr("data-kt-stepper-action", "next"),
                submit: KAction::make('Submit')
                    ->type("stepper")
                    ->class("btn btn-primary")
                    ->attr("data-kt-stepper-action", "submit")
            );










        parent::add($page);
       // parent::add($timeline);
        parent::add($stepper);

    }

    public function onAction1(TPage $t){



    }

}