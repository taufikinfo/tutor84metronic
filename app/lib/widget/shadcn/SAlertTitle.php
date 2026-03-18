<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAlertTitle extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('h5');
        $this->class = 'mb-1 font-medium leading-none tracking-tight';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
