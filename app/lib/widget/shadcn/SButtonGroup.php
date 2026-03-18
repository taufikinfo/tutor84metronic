<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SButtonGroup extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'inline-flex shadow-sm rounded-md';
        
        $this->class.=" btn-group";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
