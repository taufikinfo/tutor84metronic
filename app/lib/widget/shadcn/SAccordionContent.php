<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAccordionContent extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'accordion-collapse collapse text-sm pb-4 pt-0';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
