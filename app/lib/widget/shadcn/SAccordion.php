<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAccordion extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'accordion w-full';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
