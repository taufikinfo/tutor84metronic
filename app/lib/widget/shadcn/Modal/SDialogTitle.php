<?php

namespace App\Lib\Widget\Shadcn\Modal;

use Adianti\Widget\Base\TElement;

class SDialogTitle extends TElement
{
    public function __construct($value = '')
    {
        parent::__construct('h2');
        $this->class = 's-dialog-title';
        if ($value) $this->add($value);
    }
}
