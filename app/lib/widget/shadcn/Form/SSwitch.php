<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TCheckButton;

class SSwitch extends TCheckButton
{
    public function __construct($name = '', $label = '')
    {
        parent::__construct($name);
        $this->setIndexValue('1');
        $this->class = 's-switch';
        
        // Use Native Adianti Switch mechanics but overwrite the UI
        $this->setUseSwitch(true, '');
        
        if ($label) {
            $lbl = new SLabel($label, $this->id);
            $lbl->style = "margin-left: 0.5rem; cursor: pointer; user-select: none;";
            $this->after($lbl);
        }
    }
}
