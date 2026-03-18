<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SRadioGroup extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'grid gap-2';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
