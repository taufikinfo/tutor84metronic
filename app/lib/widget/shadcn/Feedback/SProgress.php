<?php
namespace App\Lib\Widget\Shadcn\Feedback;
use Adianti\Widget\Base\TElement;
class SProgress extends TElement
{
    public function __construct($value = 33)
    {
        parent::__construct('div');
        $this->class = 's-progress';
        $this->setProperty('role', 'progressbar');
        $this->setProperty('aria-valuenow', $value);
        $bar = new TElement('div');
        $bar->class = 's-progress-bar';
        $bar->style = "width:{$value}%";
        $this->add($bar);
    }
}
