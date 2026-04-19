<?php

namespace App\Lib\Widget\Shadcn\Feedback;

use Adianti\Widget\Base\TElement;

class SToggle extends TElement
{
    public function __construct($label = '')
    {
        parent::__construct('button');
        $this->class = 's-toggle';
        $this->setProperty('type', 'button');
        $this->setProperty('aria-pressed', 'false');
        $this->setProperty('onclick', "this.classList.toggle('active');this.setAttribute('aria-pressed',this.classList.contains('active'));");
        if ($label) $this->add($label);
    }
}
