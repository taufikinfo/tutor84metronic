<?php
namespace App\Lib\Widget\Shadcn\Layout;
use Adianti\Widget\Base\TElement;

class SAccordionTrigger extends TElement
{
    public function __construct($label = '')
    {
        parent::__construct('button');
        $this->class = 's-accordion-trigger';
        $this->setProperty('type', 'button');
        if ($label) $this->add($label);
    }
}
