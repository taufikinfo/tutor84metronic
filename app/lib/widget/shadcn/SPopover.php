<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SPopover extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'z-50 w-72 rounded-md border bg-popover p-4 text-popover-foreground shadow-md outline-none data-[state=open]:animate-in';
        
        $this->setProperty("data-bs-toggle", "popover");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
