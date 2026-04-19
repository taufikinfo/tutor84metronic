<?php

namespace App\Lib\Widget\Shadcn\Feedback;

use Adianti\Widget\Base\TElement;

class SToast extends TElement
{
    public function __construct($variant = 'default')
    {
        parent::__construct('div');
        $this->class = 's-toast' . ($variant === 'destructive' ? ' s-toast-destructive' : '');
        $this->setProperty('role', 'alert');
    }
}
