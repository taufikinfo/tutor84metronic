<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SToggle extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('button');
        $this->class = 'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors hover:bg-muted hover:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground';
        
        $this->class.=" btn-check";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
