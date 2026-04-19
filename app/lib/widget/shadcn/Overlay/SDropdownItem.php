<?php

namespace App\Lib\Widget\Shadcn\Overlay;

use Adianti\Widget\Base\TElement;

class SDropdownItem extends TElement
{
    public function __construct($label = '', $variant = 'default')
    {
        parent::__construct('button');
        $this->class = 's-dropdown-item';
        if ($variant === 'destructive') {
            $this->class .= ' s-dropdown-item-destructive';
        }
        $this->setProperty('type', 'button');
        if ($label) $this->add($label);
    }
}
