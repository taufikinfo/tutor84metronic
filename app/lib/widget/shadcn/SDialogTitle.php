<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDialogTitle extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('h2');
        $this->class = 'modal-title text-lg font-semibold leading-none tracking-tight';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
