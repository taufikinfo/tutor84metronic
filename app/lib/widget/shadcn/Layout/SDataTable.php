<?php

namespace App\Lib\Widget\Shadcn\Layout;

use Adianti\Widget\Base\TElement;

class SDataTable extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-datatable';
    }
}
