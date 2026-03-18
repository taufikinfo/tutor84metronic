<?php
class ShadcnShowcase extends TPage {
    public function __construct() {
        parent::__construct();
        
        $vbox = new TVBox;
        $vbox->style = 'width: 100%; padding: 20px; gap: 20px;';
        
        $title = new App\Lib\Widget\Shadcn\STypography('Shadcn UI Architecture Showcase');
        $vbox->add($title);
        
        $row = new TElement('div');
        $row->class = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6';

        // Generic Accordion
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Accordion'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SAccordion;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Alert
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Alert'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $alert = new App\Lib\Widget\Shadcn\SAlert;
        $alert->add(new App\Lib\Widget\Shadcn\SAlertTitle('Heads up!'));
        $alert->add(new App\Lib\Widget\Shadcn\SAlertDescription('You can add components to your app using the cli.'));
        $content->add($alert);
        $card->add($content);
        $row->add($card);

        // Generic AlertDialog
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('AlertDialog'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SAlertDialog;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic AspectRatio
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('AspectRatio'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SAspectRatio;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Avatar
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Avatar'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $content->add(new App\Lib\Widget\Shadcn\SAvatar);
        $card->add($content);
        $row->add($card);

        // SBadge
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Badge'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $content->class .= ' flex gap-2 flex-wrap';
        $content->add(new App\Lib\Widget\Shadcn\SBadge('Active'));
        $content->add(new App\Lib\Widget\Shadcn\SBadge('Pending'));
        $card->add($content);
        $row->add($card);

        // Generic Breadcrumb
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Breadcrumb'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SBreadcrumb;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // SButton
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Button'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $content->class .= ' flex gap-2 flex-wrap';
        $content->add(new App\Lib\Widget\Shadcn\SButton('Default'));
        $content->add(new App\Lib\Widget\Shadcn\SButton('Destructive', 'destructive'));
        $content->add(new App\Lib\Widget\Shadcn\SButton('Outline', 'outline'));
        $card->add($content);
        $row->add($card);

        // Generic ButtonGroup
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('ButtonGroup'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SButtonGroup;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Carousel
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Carousel'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SCarousel;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Chart
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Chart'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SChart;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Checkbox
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Checkbox'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $chk = new App\Lib\Widget\Shadcn\SCheckbox;
        $content->add($chk);
        $card->add($content);
        $row->add($card);

        // Generic Collapsible
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Collapsible'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SCollapsible;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Combobox
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Combobox'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SCombobox;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Command
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Command'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SCommand;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic ContextMenu
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('ContextMenu'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SContextMenu;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic DataTable
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('DataTable'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SDataTable;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic DatePicker
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('DatePicker'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SDatePicker;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Dialog
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Dialog'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SDialog;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Direction
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Direction'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SDirection;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Drawer
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Drawer'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SDrawer;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic DropdownMenu
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('DropdownMenu'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SDropdownMenu;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Empty
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Empty'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SEmpty;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Field
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Field'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SField;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic HoverCard
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('HoverCard'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SHoverCard;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // SInput
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Input'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $in = new App\Lib\Widget\Shadcn\SInput;
        $in->placeholder = 'Email address...';
        $content->add($in);
        $card->add($content);
        $row->add($card);

        // Generic InputGroup
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('InputGroup'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SInputGroup;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic InputOTP
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('InputOTP'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SInputOTP;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Item
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Item'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SItem;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Kbd
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Kbd'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SKbd;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Label
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Label'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SLabel;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Menubar
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Menubar'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SMenubar;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic NativeSelect
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('NativeSelect'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SNativeSelect;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic NavigationMenu
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('NavigationMenu'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SNavigationMenu;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Pagination
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Pagination'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SPagination;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Popover
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Popover'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SPopover;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Progress
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Progress'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $p = new App\Lib\Widget\Shadcn\SProgress;
        $content->add($p);
        $card->add($content);
        $row->add($card);

        // Generic RadioGroup
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('RadioGroup'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SRadioGroup;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Resizable
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Resizable'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SResizable;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic ScrollArea
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('ScrollArea'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SScrollArea;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Select
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Select'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SSelect;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Separator
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Separator'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SSeparator;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Sheet
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Sheet'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SSheet;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Sidebar
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Sidebar'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SSidebar;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Skeleton
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Skeleton'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $s = new App\Lib\Widget\Shadcn\SSkeleton;
        $s->class .= ' h-[20px] w-full mb-2';
        $content->add($s);
        $card->add($content);
        $row->add($card);

        // Generic Slider
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Slider'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SSlider;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Sonner
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Sonner'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SSonner;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // SSpinner
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Spinner'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $content->add(new App\Lib\Widget\Shadcn\SSpinner);
        $card->add($content);
        $row->add($card);

        // SSwitch
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Switch'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $chk = new App\Lib\Widget\Shadcn\SSwitch;
        $content->add($chk);
        $card->add($content);
        $row->add($card);

        // Generic Table
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Table'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\STable;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Tabs
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Tabs'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\STabs;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Textarea
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Textarea'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\STextarea;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Toast
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Toast'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SToast;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Toggle
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Toggle'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SToggle;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic ToggleGroup
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('ToggleGroup'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\SToggleGroup;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Tooltip
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Tooltip'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\STooltip;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        // Generic Typography
        $card = new App\Lib\Widget\Shadcn\SCard;
        $hdr = new App\Lib\Widget\Shadcn\SCardHeader;
        $hdr->add(new App\Lib\Widget\Shadcn\SCardTitle('Typography'));
        $card->add($hdr);
        $content = new App\Lib\Widget\Shadcn\SCardContent;
        $el = new App\Lib\Widget\Shadcn\STypography;
        $content->add($el);
        $card->add($content);
        $row->add($card);

        $vbox->add($row);
        parent::add($vbox);
    }
}
