<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SHoverCard extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'z-50 w-64 rounded-md border bg-popover p-4 text-popover-foreground shadow-md outline-none';
        
        $this->setProperty("data-bs-toggle", "popover"); $this->setProperty("data-bs-trigger", "hover");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
