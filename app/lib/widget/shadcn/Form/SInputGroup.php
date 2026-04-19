<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Base\TElement;

class SInputGroup extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-input-group';
    }
}
