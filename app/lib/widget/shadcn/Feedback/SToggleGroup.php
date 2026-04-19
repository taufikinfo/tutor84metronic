<?php

namespace App\Lib\Widget\Shadcn\Feedback;

use Adianti\Widget\Base\TElement;

class SToggleGroup extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-toggle-group';
    }
}
