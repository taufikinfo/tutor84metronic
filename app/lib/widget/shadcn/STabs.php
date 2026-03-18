<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STabs extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'w-full';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
