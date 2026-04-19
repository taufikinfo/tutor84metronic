<?php
namespace App\Lib\Widget\Shadcn\Feedback;
use Adianti\Widget\Base\TElement;

class SAlertTitle extends TElement
{
    public function __construct($value = '')
    {
        parent::__construct('h5');
        $this->class = 's-alert-title';
        if ($value) $this->add($value);
    }
}
