<?php

namespace App\Lib\Widget\Shadcn\Complex;

use Adianti\Widget\Base\TElement;

class SCalendar extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-calendar';
    }
}
