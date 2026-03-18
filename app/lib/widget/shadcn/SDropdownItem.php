<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDropdownItem extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('li');
        $this->class = 'dropdown-item relative flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none transition-colors hover:bg-accent focus:bg-accent focus:text-accent-foreground';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
