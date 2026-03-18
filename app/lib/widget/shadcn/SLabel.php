<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SLabel extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('label');
        $this->class = 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
