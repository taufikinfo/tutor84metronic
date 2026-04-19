<?php

namespace App\Lib\Widget\Shadcn\Overlay;

use Adianti\Widget\Base\TElement;
use Adianti\Control\TAction;

class SDropdownMenu extends TElement
{
    private $triggerEl;
    private $items = [];
    private $uniqueId;

    public function __construct($id = null)
    {
        $this->uniqueId = $id ?: 'dropdown_' . uniqid();
        parent::__construct('div');
        $this->class = 's-dropdown';
        $this->style = 'display: inline-block; position: relative;';
    }

    public function setTrigger(TElement $element)
    {
        $element->setProperty('data-bs-toggle', 'dropdown');
        $element->setProperty('aria-expanded', 'false');
        $this->triggerEl = clone $element;
        return $this;
    }

    public function addLabel($label)
    {
        $el = new TElement('div');
        $el->class = 'dropdown-header s-dropdown-label';
        $el->add($label);
        $this->items[] = $el;
        return $this;
    }

    public function addSeparator()
    {
        $el = new TElement('hr');
        $el->class = 'dropdown-divider s-dropdown-separator';
        $this->items[] = $el;
        return $this;
    }

    public function addItem($label, TAction $action = null, $icon = null, $variant = 'default')
    {
        $el = new TElement('a');
        $el->class = 'dropdown-item s-dropdown-item';
        if ($variant === 'destructive') {
            $el->class .= ' text-danger';
        }
        $el->href = $action ? $action->serialize() : 'javascript:void(0)';
        
        if ($icon) {
            $i = new TElement('i');
            $i->class = $icon . ' me-2';
            $el->add($i);
        }
        $el->add($label);
        $this->items[] = $el;
        return $this;
    }

    public function addCheckboxItem($label, $checked = false, TAction $action = null)
    {
        $el = new TElement('a');
        $el->class = 'dropdown-item s-dropdown-item d-flex align-items-center justify-content-between';
        $el->href = $action ? $action->serialize() : 'javascript:void(0)';
        
        $el->add("<span>$label</span>");
        if ($checked) {
            $el->add("<i class='fas fa-check'></i>");
        }
        $this->items[] = $el;
        return $this;
    }

    public function show()
    {
        if ($this->triggerEl) {
            parent::add($this->triggerEl);
        }

        $menu = new TElement('div');
        $menu->class = 'dropdown-menu s-dropdown-content s-background s-border shadow-sm';
        
        foreach ($this->items as $item) {
            $menu->add($item);
        }

        parent::add($menu);
        parent::show();
    }
}
