<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCollapsible extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'w-full';
        
        $this->class.=" collapse";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
