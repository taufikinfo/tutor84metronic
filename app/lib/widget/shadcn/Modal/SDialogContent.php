<?php

namespace App\Lib\Widget\Shadcn\Modal;

use Adianti\Widget\Base\TElement;

class SDialogContent extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 'modal-dialog modal-dialog-centered';
    }
}
