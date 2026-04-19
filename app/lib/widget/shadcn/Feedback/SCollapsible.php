<?php
namespace App\Lib\Widget\Shadcn\Feedback;
use Adianti\Widget\Base\TElement;
class SCollapsible extends TElement
{
    public function __construct($triggerLabel = '', $content = '')
    {
        parent::__construct('div');
        $id = 'coll_' . uniqid();
        
        if ($triggerLabel) {
            $btn = new SButton($triggerLabel, 'outline', 'sm');
            $btn->setProperty('data-bs-toggle', 'collapse');
            $btn->setProperty('data-bs-target', '#' . $id);
            $this->add($btn);
        }
        if ($content) {
            $panel = new TElement('div');
            $panel->class = 'collapse';
            $panel->id = $id;
            $inner = new TElement('div');
            $inner->style = 'padding-top:0.5rem;';
            $inner->add($content);
            $panel->add($inner);
            $this->add($panel);
        }
    }
}
