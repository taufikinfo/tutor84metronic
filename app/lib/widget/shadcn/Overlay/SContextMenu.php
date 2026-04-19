<?php

namespace App\Lib\Widget\Shadcn\Overlay;

use Adianti\Widget\Base\TElement;
use Adianti\Control\TAction;

class SContextMenu extends TElement
{
    private $triggerEl;
    private $items = [];
    private $uniqueId;

    public function __construct($id = null)
    {
        $this->uniqueId = $id ?: 'context_' . uniqid();
        parent::__construct('div');
        $this->style = 'display: inline-block; width: 100%;';
    }

    public function setTrigger(TElement $element)
    {
        // Instead of Bootstrap toggle, we use JS contextmenu event
        $element->class .= ' s-context-trigger';
        $js = "
            event.preventDefault();
            var menu = document.getElementById('{$this->uniqueId}_menu');
            menu.style.display = 'block';
            menu.style.left = event.pageX + 'px';
            menu.style.top = event.pageY + 'px';
            
            var closeMenu = function(e) {
                menu.style.display = 'none';
                document.removeEventListener('click', closeMenu);
            };
            setTimeout(function() {
                document.addEventListener('click', closeMenu);
            }, 0);
        ";
        $element->setProperty('oncontextmenu', $js);
        $this->triggerEl = clone $element;
        return $this;
    }

    public function addLabel($label)
    {
        $el = new TElement('div');
        $el->class = 's-dropdown-label px-3 py-1 text-muted fw-bold small';
        $el->add($label);
        $this->items[] = $el;
        return $this;
    }

    public function addSeparator()
    {
        $el = new TElement('hr');
        $el->class = 'dropdown-divider s-dropdown-separator m-1';
        $this->items[] = $el;
        return $this;
    }

    public function addItem($label, TAction $action = null, $icon = null, $variant = 'default')
    {
        $el = new TElement('a');
        $el->class = 'd-block px-3 py-1 s-dropdown-item text-decoration-none';
        if ($variant === 'destructive') {
            $el->class .= ' text-danger';
        } else {
            $el->class .= ' text-dark';
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

    public function show()
    {
        if ($this->triggerEl) {
            parent::add($this->triggerEl);
        }

        $menu = new TElement('div');
        $menu->id = $this->uniqueId . '_menu';
        $menu->class = 's-context-menu-content shadow s-background s-border rounded py-1';
        $menu->style = 'display: none; position: absolute; z-index: 1070; min-width: 12rem;';
        
        foreach ($this->items as $item) {
            $menu->add($item);
        }

        parent::add($menu);
        parent::show();
    }
}
