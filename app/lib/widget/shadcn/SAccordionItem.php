<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAccordionItem extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'accordion-item border-b border-border bg-transparent';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
