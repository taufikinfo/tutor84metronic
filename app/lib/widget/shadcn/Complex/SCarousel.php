<?php

namespace App\Lib\Widget\Shadcn\Complex;

use Adianti\Widget\Base\TElement;

class SCarousel extends TElement
{
    private $items = [];
    private $orientation = 'horizontal';
    private $uniqueId;

    public function __construct($id = null)
    {
        $this->uniqueId = $id ?: 'carousel_' . uniqid();
        parent::__construct('div');
        $this->style = 'position: relative; width: 100%;';
    }

    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
        return $this;
    }

    public function addItem(TElement $element)
    {
        $this->items[] = clone $element;
        return $this;
    }

    public function show()
    {
        $this->id = $this->uniqueId;
        $this->class = 's-carousel carousel slide';
        // Add basic bootstrap carousel functionality with Shadcn styling
        $this->setProperty('data-bs-ride', 'carousel');

        $inner = new TElement('div');
        $inner->class = 'carousel-inner s-radius overflow-hidden';

        foreach ($this->items as $index => $itemContent) {
            $item = new TElement('div');
            $item->class = 'carousel-item';
            if ($index === 0) {
                $item->class .= ' active';
            }
            // Ensure content doesn't break
            $wrapper = new TElement('div');
            $wrapper->style = 'display: flex; justify-content: center; align-items: center; min-height: 200px; padding: 2rem; background: var(--s-muted);';
            $wrapper->add($itemContent);
            $item->add($wrapper);
            $inner->add($item);
        }

        parent::add($inner);

        // Prev Button
        $prev = new TElement('button');
        $prev->class = 's-btn s-btn-outline s-btn-icon position-absolute top-50 translate-middle-y shadow-sm';
        $prev->style = 'left: -1rem; border-radius: 50%; z-index: 10; background: var(--s-background);';
        $prev->setProperty('type', 'button');
        $prev->setProperty('data-bs-target', '#' . $this->uniqueId);
        $prev->setProperty('data-bs-slide', 'prev');
        $prevIcon = new TElement('i');
        $prevIcon->class = 'fas fa-chevron-left';
        $prev->add($prevIcon);
        parent::add($prev);

        // Next Button
        $next = new TElement('button');
        $next->class = 's-btn s-btn-outline s-btn-icon position-absolute top-50 translate-middle-y shadow-sm';
        $next->style = 'right: -1rem; border-radius: 50%; z-index: 10; background: var(--s-background);';
        $next->setProperty('type', 'button');
        $next->setProperty('data-bs-target', '#' . $this->uniqueId);
        $next->setProperty('data-bs-slide', 'next');
        $nextIcon = new TElement('i');
        $nextIcon->class = 'fas fa-chevron-right';
        $next->add($nextIcon);
        parent::add($next);

        parent::show();
    }
}
