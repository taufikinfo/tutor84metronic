<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDropdownMenu extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'dropdown relative';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
