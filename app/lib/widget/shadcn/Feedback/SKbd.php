<?php

namespace App\Lib\Widget\Shadcn\Feedback;

use Adianti\Widget\Base\TElement;

class SKbd extends TElement
{
    public function __construct($value = '')
    {
        parent::__construct('kbd');
        $this->class = 's-kbd';
        if ($value) $this->add($value);
    }
}
