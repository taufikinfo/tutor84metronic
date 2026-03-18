<?php
$components = [
    // --- Layout & Typography ---
    'Card' => ['tag' => 'div', 'classes' => 'rounded-xl border bg-card text-card-foreground shadow'],
    'CardHeader' => ['tag' => 'div', 'classes' => 'flex flex-col space-y-1.5 p-6'],
    'CardTitle' => ['tag' => 'h3', 'classes' => 'font-semibold leading-none tracking-tight'],
    'CardDescription' => ['tag' => 'p', 'classes' => 'text-sm text-muted-foreground'],
    'CardContent' => ['tag' => 'div', 'classes' => 'p-6 pt-0'],
    'CardFooter' => ['tag' => 'div', 'classes' => 'flex items-center p-6 pt-0'],
    
    'Badge' => ['tag' => 'div', 'classes' => 'inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2'],
    'Separator' => ['tag' => 'div', 'classes' => 'shrink-0 bg-border h-[1px] w-full'],

    'Avatar' => ['tag' => 'div', 'classes' => 'symbol symbol-circle relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full'],
    'Skeleton' => ['tag' => 'div', 'classes' => 'animate-pulse rounded-md bg-muted'],
    
    'Typography' => ['tag' => 'h1', 'classes' => 'scroll-m-20 text-4xl font-extrabold tracking-tight lg:text-5xl'],
    'Kbd' => ['tag' => 'kbd', 'classes' => 'pointer-events-none inline-flex h-5 select-none items-center gap-1 rounded border bg-muted px-1.5 font-mono text-[10px] font-medium text-muted-foreground opacity-100'],
    'Empty' => ['tag' => 'div', 'classes' => 'flex flex-col items-center justify-center p-8 text-center animate-in fade-in-50'],

    // --- Forms & Inputs ---
    'Input' => ['tag' => 'input', 'classes' => 'flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50'],
    'Label' => ['tag' => 'label', 'classes' => 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70'],
    'Textarea' => ['tag' => 'textarea', 'classes' => 'flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50'],
    
    'Checkbox' => ['tag' => 'input', 'custom' => '$this->type="checkbox"; $this->class.=" form-check-input";', 'classes' => 'peer h-4 w-4 shrink-0 rounded-sm border border-primary shadow focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-primary data-[state=checked]:text-primary-foreground'],
    'Radio' => ['tag' => 'input', 'custom' => '$this->type="radio"; $this->class.=" form-check-input";', 'classes' => 'aspect-square h-4 w-4 rounded-full border border-primary text-primary shadow focus:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50'],
    'RadioGroup' => ['tag' => 'div', 'classes' => 'grid gap-2'],
    
    'Switch' => ['tag' => 'input', 'custom' => '$this->type="checkbox"; $this->setProperty("role", "switch"); $this->class.=" form-check-input";', 'classes' => 'peer inline-flex h-[20px] w-[36px] shrink-0 cursor-pointer items-center rounded-full border-2 border-transparent shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:ring-offset-background disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-primary data-[state=unchecked]:bg-input'],
    'Slider' => ['tag' => 'input', 'custom' => '$this->type="range"; $this->class.=" form-range";', 'classes' => 'relative flex w-full touch-none select-none items-center'],
    
    'Select' => ['tag' => 'select', 'custom' => '$this->class.=" form-select";', 'classes' => 'flex h-9 w-full items-center justify-between whitespace-nowrap rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-1 focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1'],
    'NativeSelect' => ['tag' => 'select', 'custom' => '$this->class.=" form-select";', 'classes' => 'flex w-full items-center justify-between rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm ring-offset-background focus:outline-none focus:ring-1 focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50'],
    'Combobox' => ['tag' => 'select', 'custom' => '$this->setProperty("data-control", "select2"); $this->class.=" form-select";', 'classes' => 'flex w-full items-center rounded-md border border-input bg-transparent text-sm'],
    
    'InputGroup' => ['tag' => 'div', 'classes' => 'input-group flex w-full items-center relative'],
    'InputOTP' => ['tag' => 'div', 'classes' => 'flex items-center gap-2 has-[:disabled]:opacity-50'],
    'DatePicker' => ['tag' => 'input', 'custom' => '$this->type="date"; $this->class.=" form-control";', 'classes' => 'justify-start text-left font-normal flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors'],
    'Field' => ['tag' => 'div', 'classes' => 'grid gap-2 mb-4 w-full'],

    // --- Interactive Extrapolations (Metronic Bridged) ---
    // Accordion uses Bootstrap Collapse
    'Accordion' => ['tag' => 'div', 'classes' => 'accordion w-full'],
    'AccordionItem' => ['tag' => 'div', 'classes' => 'accordion-item border-b border-border bg-transparent'],
    'AccordionTrigger' => ['tag' => 'button', 'custom' => '$this->setProperty("data-bs-toggle", "collapse");', 'classes' => 'accordion-button flex flex-1 items-center justify-between py-4 text-sm font-medium transition-all hover:underline bg-transparent text-foreground shadow-none'],
    'AccordionContent' => ['tag' => 'div', 'classes' => 'accordion-collapse collapse text-sm pb-4 pt-0'],
    
    // Dropdown uses Bootstrap Dropdown
    'DropdownMenu' => ['tag' => 'div', 'classes' => 'dropdown relative'],
    'DropdownTrigger' => ['tag' => 'button', 'custom' => '$this->setProperty("data-bs-toggle", "dropdown");', 'classes' => 'btn inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50'],
    'DropdownContent' => ['tag' => 'ul', 'classes' => 'dropdown-menu z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover p-1 text-popover-foreground shadow-md animate-in'],
    'DropdownItem' => ['tag' => 'li', 'classes' => 'dropdown-item relative flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors hover:bg-accent focus:bg-accent focus:text-accent-foreground'],
    'ContextMenu' => ['tag' => 'ul', 'classes' => 'dropdown-menu z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover p-1 text-popover-foreground shadow-md animate-in'],

    // Tabs uses Bootstrap Nav Tabs
    'Tabs' => ['tag' => 'div', 'classes' => 'w-full'],
    'TabsList' => ['tag' => 'ul', 'custom' => '$this->setProperty("role", "tablist");', 'classes' => 'nav nav-tabs inline-flex h-9 items-center justify-center rounded-lg bg-muted p-1 text-muted-foreground border-0'],
    'TabsTrigger' => ['tag' => 'button', 'custom' => '$this->setProperty("data-bs-toggle", "tab");', 'classes' => 'nav-link inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border-0'],
    'TabsContent' => ['tag' => 'div', 'classes' => 'tab-content mt-2 ring-offset-background'],
    'TabsPane' => ['tag' => 'div', 'classes' => 'tab-pane fade'],
    
    // Dialog uses Bootstrap Modal
    'Dialog' => ['tag' => 'div', 'custom' => '$this->setProperty("tabindex", "-1");', 'classes' => 'modal fade z-50'],
    'DialogContent' => ['tag' => 'div', 'classes' => 'modal-dialog modal-dialog-centered sm:max-w-[425px]'],
    'DialogPanel' => ['tag' => 'div', 'classes' => 'modal-content grid w-full gap-4 border bg-background p-6 shadow-lg sm:rounded-lg'],
    'DialogHeader' => ['tag' => 'div', 'classes' => 'modal-header flex flex-col space-y-1.5 text-center sm:text-left border-0 p-0'],
    'DialogTitle' => ['tag' => 'h2', 'classes' => 'modal-title text-lg font-semibold leading-none tracking-tight'],
    'DialogFooter' => ['tag' => 'div', 'classes' => 'modal-footer flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 border-0 p-0'],
    
    // AlertDialog (Native Bootstrap Modal variation)
    'AlertDialog' => ['tag' => 'div', 'custom' => '$this->setProperty("tabindex", "-1");', 'classes' => 'modal fade z-50'],
    
    // Drawer/Sheet uses Bootstrap Offcanvas
    'Sheet' => ['tag' => 'div', 'custom' => '$this->setProperty("tabindex", "-1"); $this->class.=" offcanvas offcanvas-end";', 'classes' => 'fixed z-50 gap-4 bg-background p-6 shadow-lg transition ease-in-out'],
    'Drawer' => ['tag' => 'div', 'custom' => '$this->setProperty("tabindex", "-1"); $this->class.=" offcanvas offcanvas-bottom";', 'classes' => 'fixed inset-x-0 bottom-0 z-50 mt-24 flex h-auto flex-col rounded-t-[10px] border bg-background'],

    // Alerts
    'Alert' => ['tag' => 'div', 'custom' => '$this->setProperty("role", "alert");', 'classes' => 'alert relative w-full rounded-lg border p-4 [&>svg~*]:pl-7 [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg]:text-foreground bg-background text-foreground'],
    'AlertTitle' => ['tag' => 'h5', 'classes' => 'mb-1 font-medium leading-none tracking-tight'],
    'AlertDescription' => ['tag' => 'div', 'classes' => 'text-sm [&_p]:leading-relaxed'],

    // Navigation & Menus
    'Menubar' => ['tag' => 'nav', 'classes' => 'navbar flex h-9 items-center space-x-1 rounded-md border bg-background p-1 shadow-sm'],
    'NavigationMenu' => ['tag' => 'nav', 'classes' => 'navbar relative z-10 flex max-w-max flex-1 items-center justify-center'],
    'Breadcrumb' => ['tag' => 'ol', 'classes' => 'breadcrumb flex flex-wrap items-center gap-1.5 break-words text-sm text-muted-foreground sm:gap-2.5'],
    'BreadcrumbItem' => ['tag' => 'li', 'classes' => 'breadcrumb-item inline-flex items-center gap-1.5'],
    'Sidebar' => ['tag' => 'aside', 'classes' => 'flex h-full w-[250px] flex-col border-r bg-background'],

    // Toast / Sonner
    'Toast' => ['tag' => 'div', 'custom' => '$this->setProperty("role", "alert"); $this->class.=" toast";', 'classes' => 'pointer-events-auto relative flex w-full items-center justify-between space-x-2 overflow-hidden rounded-md border p-4 pr-8 shadow-lg transition-all'],
    'Sonner' => ['tag' => 'div', 'classes' => 'toaster group'],

    // Table / DataTable
    'Table' => ['tag' => 'table', 'custom' => '$this->class.=" table";', 'classes' => 'w-full caption-bottom text-sm'],
    'TableHeader' => ['tag' => 'thead', 'classes' => '[&_tr]:border-b'],
    'TableRow' => ['tag' => 'tr', 'classes' => 'border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted'],
    'TableHead' => ['tag' => 'th', 'classes' => 'h-10 px-2 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0'],
    'TableCell' => ['tag' => 'td', 'classes' => 'p-2 align-middle [&:has([role=checkbox])]:pr-0'],
    'TableBody' => ['tag' => 'tbody', 'classes' => '[&_tr:last-child]:border-0'],
    'DataTable' => ['tag' => 'div', 'classes' => 'rounded-md border'],

    // Pagination
    'Pagination' => ['tag' => 'nav', 'custom' => '$this->class.=" pagination";', 'classes' => 'mx-auto flex w-full justify-center'],
    'PaginationItem' => ['tag' => 'li', 'classes' => 'page-item'],

    // Overlays & Tooltips
    'Tooltip' => ['tag' => 'div', 'custom' => '$this->setProperty("data-bs-toggle", "tooltip");', 'classes' => 'z-50 overflow-hidden rounded-md border bg-popover px-3 py-1.5 text-sm text-popover-foreground shadow-md animate-in'],
    'Popover' => ['tag' => 'div', 'custom' => '$this->setProperty("data-bs-toggle", "popover");', 'classes' => 'z-50 w-72 rounded-md border bg-popover p-4 text-popover-foreground shadow-md outline-none data-[state=open]:animate-in'],
    'HoverCard' => ['tag' => 'div', 'custom' => '$this->setProperty("data-bs-toggle", "popover"); $this->setProperty("data-bs-trigger", "hover");', 'classes' => 'z-50 w-64 rounded-md border bg-popover p-4 text-popover-foreground shadow-md outline-none'],
    
    // Components
    'Spinner' => ['tag' => 'div', 'custom' => '$this->setProperty("role", "status"); $this->class.=" spinner-border";', 'classes' => 'text-primary inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-r-transparent align-[-0.125em]'],
    'Progress' => ['tag' => 'div', 'custom' => '$this->class.=" progress";', 'classes' => 'relative h-2 w-full overflow-hidden rounded-full bg-primary/20'],
    'Command' => ['tag' => 'div', 'classes' => 'flex h-full w-full flex-col overflow-hidden rounded-md bg-popover text-popover-foreground'],
    'Carousel' => ['tag' => 'div', 'custom' => '$this->class.=" carousel slide"; $this->setProperty("data-bs-ride", "carousel");', 'classes' => 'relative'],
    'Toggle' => ['tag' => 'button', 'custom' => '$this->class.=" btn-check";', 'classes' => 'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors hover:bg-muted hover:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground'],
    'ToggleGroup' => ['tag' => 'div', 'custom' => '$this->class.=" btn-group";', 'classes' => 'flex items-center justify-center gap-1'],
    'ButtonGroup' => ['tag' => 'div', 'custom' => '$this->class.=" btn-group";', 'classes' => 'inline-flex shadow-sm rounded-md'],
    'Collapsible' => ['tag' => 'div', 'custom' => '$this->class.=" collapse";', 'classes' => 'w-full'],
    'AspectRatio' => ['tag' => 'div', 'custom' => '$this->setProperty("style", "aspect-ratio: 16 / 9;");', 'classes' => 'w-full overflow-hidden rounded-md'],
    'Item' => ['tag' => 'div', 'classes' => 'flex items-center'],
    'Direction' => ['tag' => 'div', 'custom' => '$this->setProperty("dir", "rtl");', 'classes' => 'w-full'],
    'ScrollArea' => ['tag' => 'div', 'custom' => '$this->class.=" scroll-y";', 'classes' => 'relative overflow-hidden'],
    'Chart' => ['tag' => 'div', 'classes' => 'flex aspect-video justify-center text-xs [&_.recharts-cartesian-axis-tick_text]:fill-muted-foreground [&_.recharts-cartesian-grid_line[stroke=\'#ccc\']]:stroke-border/50 [&_.recharts-curve.recharts-tooltip-cursor]:stroke-border [&_.recharts-dot[stroke=\'#fff\']]:stroke-transparent [&_.recharts-layer]:outline-none [&_.recharts-polar-grid_[stroke=\'#ccc\']]:stroke-border [&_.recharts-radial-bar-background-sector]:fill-muted [&_.recharts-rectangle.recharts-tooltip-cursor]:fill-muted [&_.recharts-reference-line_[stroke=\'#ccc\']]:stroke-border [&_.recharts-sector[stroke=\'#fff\']]:stroke-transparent [&_.recharts-sector]:outline-none [&_.recharts-surface]:outline-none'],
    'Resizable' => ['tag' => 'div', 'classes' => 'flex w-full items-center justify-center rounded-lg border']
];

$dir = __DIR__ . "/app/lib/widget/shadcn";
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Add SButton explicitly (variant map)
$phpCodeButton = "<?php
namespace App\\Lib\\Widget\\Shadcn;

use Adianti\\Widget\\Base\\TElement;

class SButton extends TElement
{
    public function __construct(\$value, \$variant = 'default', \$size = 'default')
    {
        parent::__construct('button');
        \$this->add(\$value);
        
        \$baseClass = 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 btn';
        
        \$variants = [
            'default' => 'bg-primary text-primary-foreground shadow hover:bg-primary/90',
            'destructive' => 'bg-danger text-white shadow-sm hover:bg-danger/90',
            'outline' => 'border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground',
            'secondary' => 'bg-secondary text-secondary-foreground shadow-sm hover:bg-secondary/80',
            'ghost' => 'hover:bg-accent hover:text-accent-foreground',
            'link' => 'text-primary underline-offset-4 hover:underline'
        ];
        
        \$sizes = [
            'default' => 'h-9 px-4 py-2',
            'sm' => 'h-8 rounded-md px-3 text-xs',
            'lg' => 'h-10 rounded-md px-8',
            'icon' => 'h-9 w-9'
        ];
        
        \$vClass = \$variants[\$variant] ?? \$variants['default'];
        \$sClass = \$sizes[\$size] ?? \$sizes['default'];
        
        \$this->class = \"\$baseClass \$vClass \$sClass\";
    }
}
";
file_put_contents("$dir/SButton.php", $phpCodeButton);

// Generate generic components dynamically
foreach ($components as $name => $struct) {
    if ($name === 'Button') continue;

    $className = "S" . $name;
    $tag = $struct['tag'] ?? 'div';
    $customLogic = $struct['custom'] ?? '';
    $classes = $struct['classes'] ?? '';

    $template = "<?php
namespace App\\Lib\\Widget\\Shadcn;

use Adianti\\Widget\\Base\\TElement;

class $className extends TElement
{
    public function __construct(\$id = null)
    {
        parent::__construct('$tag');
        \$this->class = '$classes';
        
        $customLogic
        
        if (\$id) {
            \$this->id = \$id;
        }
    }
}
";
    file_put_contents("$dir/$className.php", $template);
}

echo "Successfully regenerated 59 Shadcn variants with Metronic bridges.\\n";
