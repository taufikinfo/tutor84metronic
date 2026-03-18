<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAccordionTrigger extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('button');
        $this->class = 'accordion-button flex flex-1 items-center justify-between py-4 text-sm font-medium transition-all hover:underline bg-transparent text-foreground shadow-none';
        
        $this->setProperty("data-bs-toggle", "collapse");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
