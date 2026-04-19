<?php

namespace App\Lib\Widget\Shadcn\Modal;

use Adianti\Widget\Base\TElement;

class SDialogFooter extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-dialog-footer';
    }
}
