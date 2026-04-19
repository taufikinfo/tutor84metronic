<?php
namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TRadioButton;

class SRadio extends TRadioButton
{
    public function __construct($name = '')
    {
        parent::__construct($name);
        $this->class = 's-radio';
    }
}
