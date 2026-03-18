<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STableCell extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('td');
        $this->class = 'p-2 align-middle [&:has([role=checkbox])]:pr-0';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
