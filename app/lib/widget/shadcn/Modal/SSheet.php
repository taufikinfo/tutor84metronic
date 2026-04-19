<?php

namespace App\Lib\Widget\Shadcn\Modal;

use Adianti\Widget\Base\TElement;

class SSheet extends TElement
{
    private $titleText = '';
    private $descriptionText = '';
    private $triggerEl;
    private $contentEl;
    private $footerEl;
    private $side = 'right';
    private $uniqueId;

    public function __construct($id = null)
    {
        $this->uniqueId = $id ?: 'sheet_' . uniqid();
        parent::__construct('div');
        $this->style = 'display: inline-block;';
    }

    public function setSide($side)
    {
        $this->side = $side;
        return $this;
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
        $element->setProperty('data-bs-toggle', 'offcanvas');
        $element->setProperty('data-bs-target', '#' . $this->uniqueId);
        $this->triggerEl = clone $element;
        return $this;
    }

    public function setContent(TElement $element)
    {
        $this->contentEl = clone $element;
        return $this;
    }

    public function setFooter(TElement $element)
    {
        $this->footerEl = clone $element;
        return $this;
    }

    public function show()
    {
        if ($this->triggerEl) {
            parent::add($this->triggerEl);
        }

        $sideMap = [
            'right'  => 'offcanvas-end',
            'left'   => 'offcanvas-start',
            'top'    => 'offcanvas-top',
            'bottom' => 'offcanvas-bottom',
        ];
        $offcanvasClass = $sideMap[$this->side] ?? 'offcanvas-end';

        $sheet = new TElement('div');
        $sheet->class = "offcanvas $offcanvasClass s-sheet s-background s-border";
        $sheet->id = $this->uniqueId;
        $sheet->setProperty('tabindex', '-1');

        // Header
        $header = new TElement('div');
        $header->class = 'offcanvas-header s-sheet-header';

        $headerText = new TElement('div');
        if ($this->titleText) {
            $title = new TElement('h2');
            $title->class = 'offcanvas-title s-sheet-title';
            $title->add($this->titleText);
            $headerText->add($title);
        }
        if ($this->descriptionText) {
            $desc = new TElement('p');
            $desc->class = 's-sheet-description text-muted mt-1';
            $desc->style = 'font-size: 0.875rem;';
            $desc->add($this->descriptionText);
            $headerText->add($desc);
        }
        $header->add($headerText);

        $closeBtn = new TElement('button');
        $closeBtn->class = 'btn-close';
        $closeBtn->setProperty('data-bs-dismiss', 'offcanvas');
        $header->add($closeBtn);
        
        $sheet->add($header);

        // Body
        $body = new TElement('div');
        $body->class = 'offcanvas-body s-sheet-content';
        if ($this->contentEl) {
            $body->add($this->contentEl);
        }
        $sheet->add($body);

        // Footer
        if ($this->footerEl) {
            $footer = clone $this->footerEl;
            $footer->class .= ' s-sheet-footer p-3 border-top';
            $sheet->add($footer);
        }

        // Move to body via JS to escape tricky z-index contexts
        $script = new TElement('script');
        $script->add("setTimeout(function() { var m = document.getElementById('{$this->uniqueId}'); if(m && m.parentElement !== document.body) { document.body.appendChild(m); } }, 50);");
        $sheet->add($script);

        parent::add($sheet);
        parent::show();
    }
}
