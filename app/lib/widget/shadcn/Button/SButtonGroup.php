<?php

namespace App\Lib\Widget\Shadcn\Button;

use Adianti\Widget\Base\TElement;

class SButtonGroup extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-btn-group';
    }
}
