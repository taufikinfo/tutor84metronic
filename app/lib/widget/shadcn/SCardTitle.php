<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCardTitle extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('h3');
        $this->class = 'font-semibold leading-none tracking-tight';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
