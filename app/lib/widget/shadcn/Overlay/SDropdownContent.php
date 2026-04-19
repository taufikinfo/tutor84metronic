<?php

namespace App\Lib\Widget\Shadcn\Overlay;

use Adianti\Widget\Base\TElement;

class SDropdownContent extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-dropdown-content';
    }
}
