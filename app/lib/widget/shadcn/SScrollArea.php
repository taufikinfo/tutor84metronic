<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SScrollArea extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'relative overflow-hidden';
        
        $this->class.=" scroll-y";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
