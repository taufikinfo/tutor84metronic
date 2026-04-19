<?php
namespace App\Lib\Widget\Shadcn\Layout;
use Adianti\Widget\Base\TElement;

class SAccordionContent extends TElement
{
    public function __construct($content = '')
    {
        parent::__construct('div');
        $this->class = 's-accordion-content';
        if ($content) {
            $inner = new TElement('div');
            $inner->class = 's-accordion-content-inner';
            $inner->add($content);
            parent::add($inner);
        }
    }
}
