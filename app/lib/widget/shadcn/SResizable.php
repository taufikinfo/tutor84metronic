<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SResizable extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'flex w-full items-center justify-center rounded-lg border';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
