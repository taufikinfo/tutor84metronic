<?php
namespace App\Lib\Widget\Shadcn\Feedback;
use Adianti\Widget\Base\TElement;

class SAlertDescription extends TElement
{
    public function __construct($value = '')
    {
        parent::__construct('div');
        $this->class = 's-alert-description';
        if ($value) $this->add($value);
    }
}
