<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SToggleGroup extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'flex items-center justify-center gap-1';
        
        $this->class.=" btn-group";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
