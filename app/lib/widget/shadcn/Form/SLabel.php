<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TLabel;

class SLabel extends TLabel
{
    public function __construct($value, $fontColor = null, $fontSize = null, $textDecoration = null, $size = null)
    {
        parent::__construct($value, $fontColor, $fontSize, $textDecoration, $size);
        $this->class = "s-label"; // Ensure Shadcn label styling
    }
}
