<?php

namespace App\Lib\Widget\Shadcn\Feedback;

use Adianti\Widget\Base\TElement;

class SEmpty extends TElement
{
    public function __construct($text = 'No results found.')
    {
        parent::__construct('div');
        $this->class = 's-empty';
        $icon = new TElement('span');
        $icon->class = 's-empty-icon';
        $icon->add('∅');
        $this->add($icon);
        $t = new TElement('p');
        $t->class = 's-empty-text';
        $t->add($text);
        $this->add($t);
    }
}
