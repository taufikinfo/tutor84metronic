<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STableBody extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('tbody');
        $this->class = '[&_tr:last-child]:border-0';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
