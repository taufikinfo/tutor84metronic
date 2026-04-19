<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TSlider;

class SSlider extends TSlider
{
    public function __construct($name = '')
    {
        parent::__construct($name);
        $this->class = 's-slider';
    }
}
