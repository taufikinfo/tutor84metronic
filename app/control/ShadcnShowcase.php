<?php

use App\Lib\Widget\Shadcn\Layout\SCard;
use App\Lib\Widget\Shadcn\Layout\SAccordion;
use App\Lib\Widget\Shadcn\Layout\STable;
use App\Lib\Widget\Shadcn\Layout\STabs;
use App\Lib\Widget\Shadcn\Layout\SSeparator;

use App\Lib\Widget\Shadcn\Feedback\SAlert;
use App\Lib\Widget\Shadcn\Feedback\SProgress;
use App\Lib\Widget\Shadcn\Feedback\SSkeleton;
use App\Lib\Widget\Shadcn\Feedback\SSpinner;
use App\Lib\Widget\Shadcn\Feedback\SEmpty;
use App\Lib\Widget\Shadcn\Feedback\SChart;
use App\Lib\Widget\Shadcn\Feedback\SCollapsible;
use App\Lib\Widget\Shadcn\Feedback\SKbd;
use App\Lib\Widget\Shadcn\Feedback\SToggle;
use App\Lib\Widget\Shadcn\Feedback\SToggleGroup;
use App\Lib\Widget\Shadcn\Feedback\SAspectRatio;

use App\Lib\Widget\Shadcn\Badge\SAvatar;
use App\Lib\Widget\Shadcn\Badge\SBadge;

use App\Lib\Widget\Shadcn\Button\SButton;
use App\Lib\Widget\Shadcn\Button\SButtonGroup;

use App\Lib\Widget\Shadcn\Form\SInput;
use App\Lib\Widget\Shadcn\Form\STextarea;
use App\Lib\Widget\Shadcn\Form\SCheckbox;
use App\Lib\Widget\Shadcn\Form\SSwitch;
use App\Lib\Widget\Shadcn\Form\SRadioGroup;
use App\Lib\Widget\Shadcn\Form\SSelect;
use App\Lib\Widget\Shadcn\Form\SDatePicker;
use App\Lib\Widget\Shadcn\Form\SSlider;
use App\Lib\Widget\Shadcn\Form\SField;
use App\Lib\Widget\Shadcn\Form\SLabel;
use App\Lib\Widget\Shadcn\Form\SInputOTP;
use App\Lib\Widget\Shadcn\Form\SInputGroup;

use App\Lib\Widget\Shadcn\Overlay\SDropdownMenu;
use App\Lib\Widget\Shadcn\Overlay\SPopover;
use App\Lib\Widget\Shadcn\Overlay\SHoverCard;
use App\Lib\Widget\Shadcn\Overlay\STooltip;
use App\Lib\Widget\Shadcn\Overlay\SContextMenu;

use App\Lib\Widget\Shadcn\Modal\SAlertDialog;
use App\Lib\Widget\Shadcn\Modal\SDialog;
use App\Lib\Widget\Shadcn\Modal\SSheet;
use App\Lib\Widget\Shadcn\Modal\SDrawer;

use App\Lib\Widget\Shadcn\Complex\SCarousel;
use App\Lib\Widget\Shadcn\Complex\SResizable;
use App\Lib\Widget\Shadcn\Complex\SBreadcrumb;
use App\Lib\Widget\Shadcn\Complex\SNavigationMenu;
use App\Lib\Widget\Shadcn\Complex\SMenubar;
use App\Lib\Widget\Shadcn\Complex\SPagination;

use App\Lib\Widget\Shadcn\Typography\STypography;
use Adianti\Widget\Base\TElement;

class ShadcnShowcase extends TPage {
    
    public function __construct() {
        parent::__construct();
        
        $wrapper = new TElement('div');
        $wrapper->style = 'display: flex; height: 100vh; overflow: hidden; background: var(--s-background); color: var(--s-foreground);';
        
        // --- Sidebar ---
        $sidebar = new TElement('div');
        $sidebar->class = 's-border border-end';
        $sidebar->style = 'width: 250px; flex-shrink: 0; display: flex; flex-direction: column;';
        
        $brand = new TElement('div');
        $brand->style = 'padding: 1.5rem; border-bottom: 1px solid var(--s-border);';
        $brand->add(new STypography('Shadcn UI', 'h4'));
        $brand->add(new STypography('for Adianti', 'muted'));
        $sidebar->add($brand);
        
        $navOutput = new TElement('div');
        $navOutput->style = 'overflow-y: auto; flex-grow: 1; padding: 1rem; display: flex; flex-direction: column; gap: 0.25rem;';
        
        $components = [
            'typography' => 'Typography',
            'buttons' => 'Buttons',
            'badges' => 'Badges & Avatars',
            'inputs' => 'Forms & Inputs',
            'modals' => 'Modals & Dialogs',
            'overlays' => 'Menus & Overlays',
            'layout' => 'Layouts & Data',
            'complex' => 'Complex Components',
            'feedback' => 'Feedback States'
        ];
        
        foreach ($components as $id => $label) {
            $link = new TElement('a');
            $link->href = '#' . $id;
            $link->class = 's-btn s-btn-ghost text-start justify-content-start w-100';
            $link->add($label);
            $navOutput->add($link);
        }
        $sidebar->add($navOutput);
        
        // --- Main Content ---
        $main = new TElement('div');
        $main->style = 'flex-grow: 1; overflow-y: auto; scroll-behavior: smooth; padding: 2rem 4rem;';
        
        $header = new TElement('div');
        $header->style = 'margin-bottom: 3rem;';
        $header->add(new STypography('Component Documentation', 'h1'));
        $header->add(new STypography('Browse all components, variants, and configurations.', 'muted'));
        $main->add($header);

        // Sections
        $main->add($this->sectionTypography());
        $main->add(new SSeparator());
        $main->add($this->sectionButtons());
        $main->add(new SSeparator());
        $main->add($this->sectionBadges());
        $main->add(new SSeparator());
        $main->add($this->sectionInputs());
        $main->add(new SSeparator());
        $main->add($this->sectionModals());
        $main->add(new SSeparator());
        $main->add($this->sectionOverlays());
        $main->add(new SSeparator());
        $main->add($this->sectionLayout());
        $main->add(new SSeparator());
        $main->add($this->sectionComplex());
        $main->add(new SSeparator());
        $main->add($this->sectionFeedback());
        $main->add(new SSeparator());
        
        $wrapper->add($sidebar);
        $wrapper->add($main);
        parent::add($wrapper);
    }
    
    private function createSection($id, $title, $description, $content) {
        $sec = new TElement('section');
        $sec->id = $id;
        $sec->style = 'padding: 4rem 0;';
        
        $head = new TElement('div');
        $head->style = 'margin-bottom: 2rem;';
        $head->add(new STypography($title, 'h2'));
        $desc = new STypography($description, 'muted');
        $desc->style = 'margin-top: 0.5rem; font-size: 1.125rem;';
        $head->add($desc);
        $sec->add($head);
        
        $sec->add($content);
        return $sec;
    }

    private function sectionTypography() {
        $wrap = new TElement('div');
        $wrap->style = 'display: flex; flex-direction: column; gap: 2rem;';
        
        $wrap->add(new STypography('h1. The quick brown fox jumps over the lazy dog', 'h1'));
        $wrap->add(new STypography('h2. The quick brown fox jumps over the lazy dog', 'h2'));
        $wrap->add(new STypography('h3. The quick brown fox jumps over the lazy dog', 'h3'));
        $wrap->add(new STypography('h4. The quick brown fox jumps over the lazy dog', 'h4'));
        $wrap->add(new STypography('Paragraph text. The quick brown fox jumps over the lazy dog. It relies gracefully on the selected font family, prioritizing Inter and system sans-serif fonts.', 'p'));
        $wrap->add(new STypography('Muted helper text used for sub-labels and hints.', 'muted'));
        
        return $this->createSection('typography', 'Typography', 'Styles for headings, paragraphs, lists...etc', $wrap);
    }

    private function sectionButtons() {
        $wrap = new TElement('div');
        $wrap->style = 'display: flex; flex-direction: column; gap: 2rem;';
        
        $vCard = new SCard();
        $vCard->setHeader('Variants');
        $vBox = new TElement('div');
        $vBox->style = 'display: flex; flex-wrap: wrap; gap: 1rem;';
        $vBox->add(new SButton('Default'));
        $vBox->add(new SButton('Secondary', 'secondary'));
        $vBox->add(new SButton('Destructive', 'destructive'));
        $vBox->add(new SButton('Outline', 'outline'));
        $vBox->add(new SButton('Ghost', 'ghost'));
        $vBox->add(new SButton('Link', 'link'));
        $vCard->setContent($vBox);
        $wrap->add($vCard);
        
        $sCard = new SCard();
        $sCard->setHeader('Sizes');
        $sBox = new TElement('div');
        $sBox->style = 'display: flex; flex-wrap: wrap; gap: 1rem; align-items: center;';
        $sBox->add(new SButton('Small', 'default', 'sm'));
        $sBox->add(new SButton('Default'));
        $sBox->add(new SButton('Large', 'default', 'lg'));
        
        $iconBtn = new SButton('', 'outline', 'icon');
        $icon = new TElement('i');
        $icon->class = 'fas fa-chevron-right';
        $iconBtn->add($icon);
        $sBox->add($iconBtn);
        $sCard->setContent($sBox);
        $wrap->add($sCard);
        
        $stCard = new SCard();
        $stCard->setHeader('States & Groups');
        $stBox = new TElement('div');
        $stBox->style = 'display: flex; flex-wrap: wrap; gap: 2rem; align-items: center;';
        
        $btnDis = new SButton('Disabled');
        $btnDis->setDisabled();
        $stBox->add($btnDis);
        
        $grp = new SButtonGroup();
        $grp->add(new SButton('Left', 'outline'));
        $grp->add(new SButton('Middle', 'outline'));
        $grp->add(new SButton('Right', 'outline'));
        $stBox->add($grp);
        
        $stCard->setContent($stBox);
        $wrap->add($stCard);

        return $this->createSection('buttons', 'Buttons', 'Displays a button or a component that looks like a button.', $wrap);
    }
    
    private function sectionBadges() {
        $wrap = new TElement('div');
        $wrap->style = 'display: flex; flex-direction: column; gap: 2rem;';
        
        $bCard = new SCard();
        $bCard->setHeader('Badges');
        $bBox = new TElement('div');
        $bBox->style = 'display: flex; flex-wrap: wrap; gap: 1rem;';
        $bBox->add(new SBadge('Default'));
        $bBox->add(new SBadge('Secondary', 'secondary'));
        $bBox->add(new SBadge('Outline', 'outline'));
        $bBox->add(new SBadge('Destructive', 'destructive'));
        $bCard->setContent($bBox);
        $wrap->add($bCard);
        
        $aCard = new SCard();
        $aCard->setHeader('Avatars');
        $aBox = new TElement('div');
        $aBox->style = 'display: flex; flex-wrap: wrap; gap: 1rem;';
        $aBox->add(new SAvatar('https://github.com/shadcn.png', 'CN'));
        $aBox->add(new SAvatar('', 'JD'));
        $aCard->setContent($aBox);
        $wrap->add($aCard);

        return $this->createSection('badges', 'Badges & Avatars', 'Visual identifiers and profile pictures.', $wrap);
    }

    private function sectionInputs() {
        $grid = new TElement('div');
        $grid->class = 'grid grid-cols-1 md:grid-cols-2 gap-6';

        $c1 = new SCard();
        $c1->setHeader('Standard Inputs');
        $box1 = new TElement('div');
        $box1->class = 'd-flex flex-column gap-3';
        
        $f1 = new SField();
        $f1->add(new SLabel('Email address'));
        $f1->add(new SInput('email', 'Enter email...'));
        $f1->add(new STypography('We will never share your email.', 'muted'));
        $box1->add($f1);

        $f2 = new SField();
        $f2->add(new SLabel('Disabled State'));
        $inpD = new SInput('text', 'Disabled...');
        $inpD->setDisabled();
        $f2->add($inpD);
        $box1->add($f2);
        
        $f3 = new SField();
        $f3->add(new SLabel('Invalid State'));
        $inpI = new SInput('text', 'Error value...');
        $inpI->setInvalid();
        $f3->add($inpI);
        $errorMessage = new STypography('This field is required.', 'p');
        $errorMessage->class = 's-typography-destructive';
        $f3->add($errorMessage);
        $box1->add($f3);
        
        $c1->setContent($box1);
        $grid->add($c1);

        $c2 = new SCard();
        $c2->setHeader('Complex Controls');
        $box2 = new TElement('div');
        $box2->class = 'd-flex flex-column gap-4';

        $f4 = new SField();
        $f4->add(new SLabel('Select Theme'));
        $sel = new SSelect('theme_id');
        $sel->addItems(['' => 'Select a theme...', 'light' => 'Light Mode', 'dark' => 'Dark Mode']);
        $f4->add($sel);
        $box2->add($f4);

        $f5 = new SField();
        $f5->add(new SLabel('Biography'));
        $f5->add(new STextarea('bio', 'Write a few words about yourself...'));
        $box2->add($f5);

        $f6 = new SField();
        $f6->add(new SLabel('Input OTP'));
        $f6->add(new SInputOTP(6));
        $box2->add($f6);

        $c2->setContent($box2);
        $grid->add($c2);

        $c3 = new SCard();
        $c3->setHeader('Switches & Checkboxes');
        $box3 = new TElement('div');
        $box3->class = 'd-flex flex-column gap-4';
        
        $box3->add(new SCheckbox('terms', 'Accept Terms and Conditions.'));
        $box3->add(new SSwitch('flight', 'Enable Airplane Mode'));
        
        $rg = new SRadioGroup('opts');
        $rg->addItems(['1' => 'Option One', '2' => 'Option Two']);
        $box3->add($rg);
        
        $c3->setContent($box3);
        $grid->add($c3);

        return $this->createSection('inputs', 'Forms & Inputs', 'Form controls, selections, and user input fields.', $grid);
    }
    
    private function sectionModals() {
        $grid = new TElement('div');
        $grid->class = 'grid grid-cols-1 gap-6';

        $c1 = new SCard();
        $c1->setHeader('Alert Dialog');
        $alertBtn = new SButton('Trigger Alert Dialog', 'outline');
        $alert = new SAlertDialog();
        $alert->setTitle('Delete Project?');
        $alert->setDescription('This cannot be undone. All project data will be wiped immediately.');
        $alert->setTrigger($alertBtn);
        $alert->addCancel(new SButton('Cancel', 'outline'));
        $alert->addAction(new SButton('Confirm Delete', 'destructive'));
        $c1->setContent($alert);
        $grid->add($c1);

        $c2 = new SCard();
        $c2->setHeader('Standard Dialog');
        $dialogBtn = new SButton('Trigger Custom Dialog', 'outline');
        $dialog = new SDialog();
        $dialog->setTitle('Invite Users');
        $dialog->setDescription("Send an invite link to your team members.");
        $dialog->setTrigger($dialogBtn);
        
        $diagContent = new TElement('div');
        $diagContent->class = 'd-flex flex-column gap-3';
        $diagContent->add(new SInput('email', 'Email Address...'));
        
        $roles = new SSelect('roles');
        $roles->addItems(['viewer' => 'Viewer', 'editor' => 'Editor']);
        $diagContent->add($roles);
        
        $dialog->setContent($diagContent);
        $dialog->setFooter(new SButton('Send Invite'));
        $c2->setContent($dialog);
        $grid->add($c2);

        $c3 = new SCard();
        $c3->setHeader('Sheets (Offcanvas)');
        $sheetBox = new TElement('div');
        $sheetBox->class = 'd-flex flex-wrap gap-2';

        foreach (['top', 'right', 'bottom', 'left'] as $side) {
            $sheetBtn = new SButton('Slide ' . ucfirst($side), 'outline');
            $sheet = new SSheet();
            $sheet->setTitle(ucfirst($side) . ' Sheet');
            $sheet->setDescription("Content sliding in from the $side edge.");
            $sheet->setSide($side);
            $sheet->setTrigger($sheetBtn);
            $sheet->setContent(new STypography('Place rich form inputs or tables here.'));
            $sheetBox->add($sheet);
        }
        
        $c3->setContent($sheetBox);
        $grid->add($c3);

        $c4 = new SCard();
        $c4->setHeader('Drawer');
        $drawerBtn = new SButton('Open Mobile Drawer', 'secondary');
        $drawer = new SDrawer();
        $drawer->setTitle('Activity Drawer');
        $drawer->setDescription("Slide up from bottom to review statistics.");
        $drawer->setDirection('bottom');
        $drawer->setTrigger($drawerBtn);
        $drawerContent = new TElement('div');
        $drawerContent->class = 'p-4 text-center';
        $drawerContent->add(new SChart()); 
        $drawer->setContent($drawerContent);
        $c4->setContent($drawer);
        $grid->add($c4);

        return $this->createSection('modals', 'Modals & Dialogs', 'Interactive modal surfaces, dialogs, drawers, and sheets.', $grid);
    }
    
    private function sectionOverlays() {
        $grid = new TElement('div');
        $grid->class = 'grid grid-cols-1 md:grid-cols-2 gap-6';

        $c1 = new SCard();
        $c1->setHeader('Dropdown Menu');
        $dd = new SDropdownMenu();
        $dd->setTrigger(new SButton('Actions Menu', 'outline'));
        $dd->addLabel('My Account');
        $dd->addSeparator();
        $dd->addItem('Profile', null, 'fas fa-user');
        $dd->addItem('Billing', null, 'fas fa-credit-card');
        $dd->addItem('Team', null, 'fas fa-users');
        $dd->addSeparator();
        $dd->addCheckboxItem('Show Status Bar', true);
        $dd->addItem('Log out', null, 'fas fa-sign-out-alt', 'destructive');
        $c1->setContent($dd);
        $grid->add($c1);

        $c2 = new SCard();
        $c2->setHeader('Context Menu');
        $ctx = new SContextMenu();
        $ctxTrigger = new TElement('div');
        $ctxTrigger->style = 'display:flex;align-items:center;justify-content:center;height:8rem;border:2px dashed var(--s-border);border-radius:var(--s-radius);color:var(--s-muted-foreground); background:var(--s-muted); cursor:context-menu;';
        $ctxTrigger->add('Right click this area');
        $ctx->setTrigger($ctxTrigger);
        $ctx->addLabel('Navigation');
        $ctx->addItem('Back');
        $ctx->addItem('Forward');
        $ctx->addSeparator();
        $ctx->addItem('Copy', null, 'fas fa-copy');
        $c2->setContent($ctx);
        $grid->add($c2);

        $cx = new SCard();
        $cx->setHeader('Mini Overlays');
        $ox = new TElement('div');
        $ox->style = 'display:flex;gap:1rem;flex-wrap:wrap;';
        
        $tt = new STooltip();
        $tt->setTrigger(new SButton('Hover Tooltip', 'outline'));
        $tt->setContent('Add to library', 'top');
        $ox->add($tt);

        $hc = new SHoverCard();
        $hcTrigger = new TElement('span');
        $hcTrigger->style = 'font-weight: 500; text-decoration: underline; text-underline-offset: 4px; cursor: pointer;';
        $hcTrigger->add('@adianti');
        $hc->setTrigger($hcTrigger);
        $hcc = new TElement('div');
        $hcc->add(new STypography('Adianti Framework', 'h4'));
        $hcc->add(new STypography('The ultimate PHP framework for rapid business application development.', 'p'));
        $hc->setContent($hcc);
        $ox->add($hc);

        $pop = new SPopover();
        $pop->setTrigger(new SButton('Open Popover', 'outline'));
        $pop->setTitle('Dimensions');
        $pop->setDescription('Set the dimensions for the layer.');
        $popC = new TElement('div');
        $popC->class = 'mt-3 d-flex flex-column gap-2';
        $popC->add(new SInput('width', 'Width...', '100%'));
        $pop->setContent($popC);
        $ox->add($pop);
        
        $cx->setContent($ox);
        $grid->add($cx);

        return $this->createSection('overlays', 'Menus & Overlays', 'Interactive overlays like popovers, tooltips, and contextual menus.', $grid);
    }
    
    private function sectionLayout() {
        $grid = new TElement('div');
        $grid->class = 'grid grid-cols-1 md:grid-cols-2 gap-6';

        // Accordion
        $c1 = new SCard();
        $c1->setHeader('Accordion');
        $acc = new SAccordion();
        $acc->addItem('Is it responsive?', new STypography('Yes. It uses flexbox to automatically adjust to container sizing.'), true);
        $acc->addItem('Is it styled?', new STypography('Yes. It completely adheres to Shadcn/UI border and font tokens.'));
        $c1->setContent($acc);
        $grid->add($c1);
        
        // Tabs
        $c4 = new SCard();
        $c4->setHeader('Tabs');
        
        $tabsWrapper = new TElement('div');
        $tabsWrapper->class = 'd-flex flex-column gap-4';
        
        $tabs = new STabs();
        $tabs->addTab('tab1', 'Account', new STypography('Make changes to your account settings here.'), true);
        $tabs->addTab('tab2', 'Password', new STypography('Change your password here.'));
        $tabsWrapper->add($tabs);
        
        $tabsLine = new STabs('line');
        $tabsLine->addTab('l1', 'General', new STypography('General settings appear here.'), true);
        $tabsLine->addTab('l2', 'Advanced', new STypography('Advanced options appear here.'));
        $tabsWrapper->add($tabsLine);
        
        $c4->setContent($tabsWrapper);
        $grid->add($c4);

        // Table
        $c3 = new SCard();
        $c3->setHeader('Data Table');
        $c3->class = 's-card col-span-1 md:col-span-2';
        $tab = new STable();
        $tab->setHeaders(['Client', 'Status', 'Payment Method', 'Amount'], ['30%', '20%', '30%', '20%']);
        
        $badge1 = clone new SBadge('Active');
        $badge2 = clone new SBadge('Inactive', 'secondary');
        
        $tab->addRow(['Alice', clone $badge1, 'Credit Card', '$250.00']);
        $tab->addRow(['Bob', clone $badge2, 'Bank Transfer', '$150.00']);
        $tab->addRow(['Charlie', clone $badge1, 'PayPal', '$350.00']);
        $c3->setContent($tab);
        $grid->add($c3);

        return $this->createSection('layout', 'Layouts & Data', 'Components for structuring complex data displays.', $grid);
    }
    
    private function sectionComplex() {
        $grid = new TElement('div');
        $grid->class = 'grid grid-cols-1 md:grid-cols-2 gap-6';

        // Carousel
        $c1 = new SCard();
        $c1->setHeader('Carousel');
        $car = new SCarousel();
        for($i=1; $i<=3; $i++) {
            $el = new TElement('div');
            $el->style = 'display:flex;align-items:center;justify-content:center;height:200px;font-size:2rem;font-weight:bold;';
            $el->add("Slide $i");
            $car->addItem($el);
        }
        $c1->setContent($car);
        $grid->add($c1);

        // Resizable
        $c2 = new SCard();
        $c2->setHeader('Resizable Panel');
        $res = new SResizable('horizontal');
        $res->addPanel(new STypography('Sidebar Menu', 'muted'), '30%');
        $res->addPanel(new STypography('Main Content Window'), '70%');
        $c2->setContent($res);
        $grid->add($c2);
        
        // Navigation / Breadcrumbs
        $c3 = new SCard();
        $c3->setHeader('Breadcrumbs & Navigation');
        $nwrap = new TElement('div');
        $nwrap->class = 'd-flex flex-column gap-3';
        
        $bc = new SBreadcrumb();
        $bc->addItem('Home', '#');
        $bc->addItem('Library', '#');
        $bc->addItem('Data');
        $nwrap->add($bc);
        
        $nav = new SNavigationMenu();
        $nav->addLink('Getting Started', '#');
        $nav->addLink('Components', '#');
        $nav->addLink('Documentation', '#');
        $nwrap->add($nav);
        
        $c3->setContent($nwrap);
        $grid->add($c3);

        return $this->createSection('complex', 'Complex Components', 'Feature-rich composite elements.', $grid);
    }
    
    private function sectionFeedback() {
        $grid = new TElement('div');
        $grid->class = 'grid grid-cols-1 md:grid-cols-2 gap-6';

        $c1 = new SCard();
        $c1->setHeader('Alert Banners');
        $awrap = new TElement('div');
        $awrap->class = 'd-flex flex-column gap-3';
        
        $a1 = new SAlert();
        $a1->add(new STypography('New Feature Available!', 'h4'));
        $a1->add(new STypography('Check out the new wiki layout feature in ShadcnShowcase.', 'muted'));
        $awrap->add($a1);
        
        $a2 = new SAlert('destructive');
        $a2->add(new STypography('Connection Lost', 'h4'));
        $a2->add(new STypography('Failed to connect to the database. Please try again.', 'p'));
        $awrap->add($a2);
        
        $c1->setContent($awrap);
        $grid->add($c1);

        $c2 = new SCard();
        $c2->setHeader('Progress & Loading');
        $lwrap = new TElement('div');
        $lwrap->class = 'd-flex flex-column gap-4';
        
        $f1 = new SField();
        $f1->add(new SLabel('File Upload (75%)'));
        $f1->add(new SProgress(75));
        $lwrap->add($f1);
        
        $f2 = new SField();
        $f2->add(new SLabel('Loading Skeletons'));
        $f2->add(new SSkeleton('100%', '20px'));
        $f2->add(new SSkeleton('80%', '20px'));
        $lwrap->add($f2);
        
        $f3 = new TElement('div');
        $f3->class = 'd-flex align-items-center gap-2 text-muted';
        $f3->add(new SSpinner());
        $f3->add('Syncing data...');
        $lwrap->add($f3);
        
        $c2->setContent($lwrap);
        $grid->add($c2);
        
        $c3 = new SCard();
        $c3->setHeader('Empty State');
        $c3->setContent(new SEmpty('No records found in the database.'));
        $grid->add($c3);

        return $this->createSection('feedback', 'Feedback States', 'Banners, progress bars, spinners, and empty states.', $grid);
    }
}
