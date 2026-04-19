<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TCombo;

class SNativeSelect extends TCombo
{
    public function __construct($name = '')
    {
        parent::__construct($name);
        $this->class = 's-select'; // Overwrite bootstrap class
    }
}
