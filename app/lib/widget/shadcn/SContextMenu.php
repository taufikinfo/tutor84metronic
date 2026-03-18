<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SContextMenu extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('ul');
        $this->class = 'dropdown-menu z-50 min-w-[8rem] overflow-hidden rounded-md border bg-popover p-1 text-popover-foreground shadow-md animate-in';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
