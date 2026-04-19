<?php

namespace App\Lib\Widget\Shadcn\Feedback;

use Adianti\Widget\Base\TElement;

class SSpinner extends TElement
{
    public function __construct($size = 'default')
    {
        parent::__construct('span');
        $this->class = 's-spinner';
        if ($size === 'sm') $this->class .= ' s-spinner-sm';
        elseif ($size === 'lg') $this->class .= ' s-spinner-lg';
    }
}
