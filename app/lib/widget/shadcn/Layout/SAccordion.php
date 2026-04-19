<?php

namespace App\Lib\Widget\Shadcn\Layout;

use Adianti\Widget\Base\TElement;

class SAccordion extends TElement
{
    private $items = [];

    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-accordion w-100';
    }

    public function addItem($title, TElement $content, $isOpen = false)
    {
        $this->items[] = [
            'id' => uniqid(),
            'title' => $title,
            'content' => clone $content,
            'isOpen' => $isOpen
        ];
        return $this;
    }

    public function show()
    {
        foreach ($this->items as $itemData) {
            $item = new TElement('div');
            $item->class = 's-accordion-item border-bottom';

            $header = new TElement('div');
            $header->class = 's-accordion-header';
            
            $btn = new TElement('button');
            $btn->class = 's-accordion-trigger w-100 d-flex align-items-center justify-content-between py-3 bg-transparent border-0 fw-medium';
            if ($itemData['isOpen']) {
                $btn->class .= ' expanded';
                $btn->setProperty('aria-expanded', 'true');
            } else {
                $btn->class .= ' collapsed';
                $btn->setProperty('aria-expanded', 'false');
            }
            $btn->setProperty('type', 'button');
            $btn->setProperty('onclick', "
                var expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
                this.classList.toggle('expanded');
                this.classList.toggle('collapsed');
                var content = this.parentElement.nextElementSibling;
                if(!expanded) {
                    content.style.maxHeight = content.scrollHeight + 'px';
                } else {
                    content.style.maxHeight = '0px';
                }
            ");
            $btn->add('<span class="fw-medium text-dark flex-grow-1 text-start">' . $itemData['title'] . '</span>');
            $item->add($header);
            $header->add($btn);

            $body = new TElement('div');
            $body->class = 's-accordion-content overflow-hidden';
            // CSS handles max-height transitions, we set initial inline state correctly
            if ($itemData['isOpen']) {
                // Not ideal hardcoding scrollheight but we let CSS handle transition for auto
                $body->style = "transition: max-height 0.2s ease-out;";
            } else {
                $body->style = "max-height: 0px; transition: max-height 0.2s ease-out;";
            }
            
            $inner = new TElement('div');
            $inner->class = 's-accordion-content-inner pb-3 text-muted';
            $inner->style = 'font-size: 0.875rem;';
            $inner->add($itemData['content']);
            
            $body->add($inner);
            $item->add($body);

            parent::add($item);
        }

        parent::show();
    }
}
