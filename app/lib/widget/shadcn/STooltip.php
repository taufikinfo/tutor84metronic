<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STooltip extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'z-50 overflow-hidden rounded-md border bg-popover px-3 py-1.5 text-sm text-popover-foreground shadow-md animate-in';
        
        $this->setProperty("data-bs-toggle", "tooltip");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
