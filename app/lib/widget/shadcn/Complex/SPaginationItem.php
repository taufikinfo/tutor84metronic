<?php

namespace App\Lib\Widget\Shadcn\Complex;

use Adianti\Widget\Base\TElement;

class SPaginationItem extends TElement
{
    public function __construct()
    {
        parent::__construct('li');
        $this->class = 's-pagination-item';
    }
}
