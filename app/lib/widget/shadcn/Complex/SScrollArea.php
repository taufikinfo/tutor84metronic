<?php

namespace App\Lib\Widget\Shadcn\Complex;

use Adianti\Widget\Base\TElement;

class SScrollArea extends TElement
{
    public function __construct($height = '200px')
    {
        parent::__construct('div');
        $this->class = 's-scroll-area';
        $this->style = "max-height:{$height};";
    }
}
