<?php
namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TText;

class STextarea extends TText
{
    public function __construct($name = '', $placeholder = '')
    {
        parent::__construct($name);
        $this->class = 's-textarea';
        if ($placeholder) {
            $this->placeholder = $placeholder;
        }
    }
}
