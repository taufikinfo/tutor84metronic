<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SField extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'grid gap-2 mb-4 w-full';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
