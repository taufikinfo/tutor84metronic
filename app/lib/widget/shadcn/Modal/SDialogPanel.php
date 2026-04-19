<?php

namespace App\Lib\Widget\Shadcn\Modal;

use Adianti\Widget\Base\TElement;

class SDialogPanel extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 'modal-content';
        $this->style = 'border-radius:var(--s-radius);border-color:var(--s-border);padding:1.5rem;';
    }
}
