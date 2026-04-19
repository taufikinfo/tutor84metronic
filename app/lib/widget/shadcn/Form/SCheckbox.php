<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TCheckButton;

class SCheckbox extends TCheckButton
{
    public function __construct($name = '', $label = '')
    {
        parent::__construct($name);
        $this->setIndexValue('1');
        $this->class = 's-checkbox';
        
        if ($label) {
            $lbl = new SLabel($label, $this->id);
            $lbl->style = "margin-left: 0.5rem; cursor: pointer; user-select: none;";
            $this->after($lbl);
        }
    }
}
