<?php

namespace App\Lib\Widget\Shadcn\Overlay;

use Adianti\Widget\Base\TElement;

class SHoverCard extends TElement
{
    private $triggerEl;
    private $contentEl;

    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-hovercard-wrapper';
        $this->style = 'display: inline-block; position: relative;';
    }

    public function setTrigger(TElement $element)
    {
        $element->class .= ' s-hovercard-trigger';
        // Remove hovercard specific styling since css pseudo hover handles it, just generic trigger styles
        $element->style .= '; cursor: pointer; text-decoration: underline; text-underline-offset: 4px;';
        $this->triggerEl = clone $element;
        return $this;
    }

    public function setContent(TElement $element)
    {
        $this->contentEl = clone $element;
        return $this;
    }

    public function show()
    {
        if ($this->triggerEl) {
            parent::add($this->triggerEl);
        }

        if ($this->contentEl) {
            $card = new TElement('div');
            // s-hovercard logic in CSS: .s-hovercard-wrapper:hover .s-hovercard { display: block; }
            $card->class = 's-hovercard s-background s-border shadow-sm s-radius p-3';
            $card->style = 'display: none; position: absolute; top: calc(100% + 6px); left: 50%; transform: translateX(-50%); z-index: 1060; width: 16rem;';
            $card->add($this->contentEl);
            parent::add($card);
        }

        parent::show();
    }
}
