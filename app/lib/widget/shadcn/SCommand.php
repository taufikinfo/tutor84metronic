<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCommand extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'flex h-full w-full flex-col overflow-hidden rounded-md bg-popover text-popover-foreground';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
