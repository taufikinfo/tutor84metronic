<?php

namespace App\Lib\Widget\Shadcn\Layout;

use Adianti\Widget\Base\TElement;

class SSeparator extends TElement
{
    public function __construct($orientation = 'horizontal')
    {
        parent::__construct('div');
        $this->class = 's-separator s-separator-' . $orientation;
    }
}
