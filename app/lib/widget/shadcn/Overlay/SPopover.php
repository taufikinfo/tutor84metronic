<?php

namespace App\Lib\Widget\Shadcn\Overlay;

use Adianti\Widget\Base\TElement;

class SPopover extends TElement
{
    private $triggerEl;
    private $contentEl;
    private $titleText;
    private $descriptionText;
    private $uniqueId;

    public function __construct($id = null)
    {
        $this->uniqueId = $id ?: 'popover_' . uniqid();
        parent::__construct('div');
        $this->class = 's-popover-wrapper';
        $this->style = 'display: inline-block; position: relative;';
    }

    public function setTitle($title)
    {
        $this->titleText = $title;
        return $this;
    }

    public function setDescription($description)
    {
        $this->descriptionText = $description;
        return $this;
    }

    public function setTrigger(TElement $element)
    {
        $element->class .= ' s-popover-trigger';
        // JS toggle logic for popover visibility
        $js = "
            var p = this.closest('.s-popover-wrapper');
            p.classList.toggle('open');
            var fn = function(e){
                if(!p.contains(e.target)){
                    p.classList.remove('open');
                    document.removeEventListener('click',fn);
                }
            };
            setTimeout(function(){document.addEventListener('click',fn);},0);
        ";
        $element->setProperty('onclick', $js);
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

        $popover = new TElement('div');
        $popover->class = 's-popover s-background s-border shadow s-radius p-3';
        $popover->style = 'display: none; position: absolute; top: calc(100% + 6px); left: 0; z-index: 1060; width: 18rem;';

        $header = new TElement('div');
        $header->class = 's-popover-header mb-2';
        
        if ($this->titleText) {
            $title = new TElement('h4');
            $title->class = 's-popover-title m-0 fw-bold';
            $title->add($this->titleText);
            $header->add($title);
        }

        if ($this->descriptionText) {
            $desc = new TElement('p');
            $desc->class = 's-popover-description text-muted small m-0 mt-1';
            $desc->add($this->descriptionText);
            $header->add($desc);
        }
        
        if ($this->titleText || $this->descriptionText) {
            $popover->add($header);
        }

        if ($this->contentEl) {
            $popover->add($this->contentEl);
        }

        parent::add($popover);
        parent::show();
    }
}
