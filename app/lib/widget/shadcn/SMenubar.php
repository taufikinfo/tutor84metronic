<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SMenubar extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('nav');
        $this->class = 'navbar flex h-9 items-center space-x-1 rounded-md border bg-background p-1 shadow-sm';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
