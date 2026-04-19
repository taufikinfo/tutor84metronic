<?php

namespace App\Lib\Widget\Shadcn\Modal;

use Adianti\Widget\Base\TElement;

class SDrawer extends TElement
{
    private $titleText = '';
    private $descriptionText = '';
    private $triggerEl;
    private $contentEl;
    private $footerEl;
    private $direction = 'bottom';
    private $uniqueId;

    public function __construct($id = null)
    {
        $this->uniqueId = $id ?: 'drawer_' . uniqid();
        parent::__construct('div');
        $this->style = 'display: inline-block;';
    }

    public function setDirection($direction)
    {
        $this->direction = $direction;
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

        $dirMap = [
            'bottom' => 'offcanvas-bottom',
            'top'    => 'offcanvas-top',
            'left'   => 'offcanvas-start',
            'right'  => 'offcanvas-end',
        ];
        $offcanvasClass = $dirMap[$this->direction] ?? 'offcanvas-bottom';

        $drawer = new TElement('div');
        // We override max-height and border-radius in CSS for drawer
        $drawer->class = "offcanvas $offcanvasClass s-drawer s-background s-border";
        $drawer->id = $this->uniqueId;
        $drawer->setProperty('tabindex', '-1');

        // Header
        $header = new TElement('div');
        $header->class = 's-drawer-header';
        $header->style = "padding: 1rem; text-align: center;"; // Default vaul-drawer style is center

        $dragHandle = new TElement('div');
        $dragHandle->style = 'width: 2rem; height: 0.25rem; background: var(--s-muted); border-radius: 9999px; margin: 0 auto 1rem auto;';
        $header->add($dragHandle);

        if ($this->titleText) {
            $title = new TElement('h2');
            $title->class = 's-drawer-title';
            $title->add($this->titleText);
            $header->add($title);
        }
        if ($this->descriptionText) {
            $desc = new TElement('p');
            $desc->class = 's-drawer-description text-muted mt-1';
            $desc->style = 'font-size: 0.875rem;';
            $desc->add($this->descriptionText);
            $header->add($desc);
        }
        
        $drawer->add($header);

        // Body
        $body = new TElement('div');
        $body->class = 'offcanvas-body s-drawer-content';
        if ($this->contentEl) {
            $body->add($this->contentEl);
        }
        $drawer->add($body);

        // Footer
        if ($this->footerEl) {
            $footer = clone $this->footerEl;
            $footer->class .= ' s-drawer-footer p-3';
            $drawer->add($footer);
        }

        // Move to body via JS to escape tricky z-index contexts
        $script = new TElement('script');
        $script->add("setTimeout(function() { var m = document.getElementById('{$this->uniqueId}'); if(m && m.parentElement !== document.body) { document.body.appendChild(m); } }, 50);");
        $drawer->add($script);

        parent::add($drawer);
        parent::show();
    }
}
