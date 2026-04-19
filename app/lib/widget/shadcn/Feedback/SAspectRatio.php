<?php

namespace App\Lib\Widget\Shadcn\Feedback;

use Adianti\Widget\Base\TElement;

class SAspectRatio extends TElement
{
    public function __construct($ratio = '16-9')
    {
        parent::__construct('div');
        $this->class = 's-aspect-ratio s-aspect-ratio-' . $ratio;
    }
}
