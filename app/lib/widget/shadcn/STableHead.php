<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STableHead extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('th');
        $this->class = 'h-10 px-2 text-left align-middle font-medium text-muted-foreground [&:has([role=checkbox])]:pr-0';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
