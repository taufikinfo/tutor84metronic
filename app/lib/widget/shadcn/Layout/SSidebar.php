<?php

namespace App\Lib\Widget\Shadcn\Layout;

use Adianti\Widget\Base\TElement;

class SSidebar extends TElement
{
    public function __construct()
    {
        parent::__construct('aside');
        $this->class = 's-sidebar';
    }
}
