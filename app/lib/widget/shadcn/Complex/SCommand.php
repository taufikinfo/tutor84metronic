<?php

namespace App\Lib\Widget\Shadcn\Complex;

use Adianti\Widget\Base\TElement;

class SCommand extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-command';
    }
}
