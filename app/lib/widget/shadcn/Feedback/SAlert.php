<?php
namespace App\Lib\Widget\Shadcn\Feedback;
use Adianti\Widget\Base\TElement;

class SAlert extends TElement
{
    public function __construct($variant = 'default')
    {
        parent::__construct('div');
        $this->class = 's-alert';
        if ($variant === 'destructive') {
            $this->class .= ' s-alert-destructive';
        }
        $this->setProperty('role', 'alert');
    }
}
