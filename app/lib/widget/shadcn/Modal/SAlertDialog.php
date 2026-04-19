<?php

namespace App\Lib\Widget\Shadcn\Modal;

use Adianti\Widget\Base\TElement;

class SAlertDialog extends TElement
{
    private $titleText = '';
    private $descriptionText = '';
    private $triggerEl;
    private $actionEl;
    private $cancelEl;
    private $uniqueId;

    public function __construct($id = null)
    {
        $this->uniqueId = $id ?: 'alert_' . uniqid();
        parent::__construct('div');
        $this->style = 'display: inline-block;';
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
        $element->setProperty('data-bs-toggle', 'modal');
        $element->setProperty('data-bs-target', '#' . $this->uniqueId);
        $this->triggerEl = clone $element;
        return $this;
    }

    public function addAction(TElement $element)
    {
        // An Adianti TAction or simple button can go here
        $this->actionEl = clone $element;
        return $this;
    }

    public function addCancel(TElement $element)
    {
        $element->setProperty('data-bs-dismiss', 'modal');
        $this->cancelEl = clone $element;
        return $this;
    }

    public function show()
    {
        // Render Trigger if any
        if ($this->triggerEl) {
            parent::add($this->triggerEl);
        }

        // Render BS Modal with Shadcn styling wrapper
        $modal = new TElement('div');
        $modal->class = 'modal fade s-dialog-overlay';
        $modal->id = $this->uniqueId;
        $modal->setProperty('tabindex', '-1');
        $modal->setProperty('aria-hidden', 'true');

        $dialog = new TElement('div');
        $dialog->class = 'modal-dialog modal-dialog-centered';

        $content = new TElement('div');
        $content->class = 'modal-content s-card';
        $content->style = "padding: 1.5rem;";

        $header = new TElement('div');
        $header->class = 's-alert-dialog-header';
        
        if ($this->titleText) {
            $title = new TElement('h2');
            $title->class = 's-alert-dialog-title';
            $title->add($this->titleText);
            $header->add($title);
        }

        if ($this->descriptionText) {
            $desc = new TElement('p');
            $desc->class = 's-alert-dialog-description';
            $desc->add($this->descriptionText);
            $header->add($desc);
        }
        $content->add($header);

        $footer = new TElement('div');
        $footer->class = 's-alert-dialog-footer';
        $footer->style = "display:flex; justify-content:flex-end; gap:0.5rem; margin-top:1.5rem;";

        if ($this->cancelEl) {
            $footer->add($this->cancelEl);
        }
        if ($this->actionEl) {
            $footer->add($this->actionEl);
        }

        $content->add($footer);
        $dialog->add($content);
        $modal->add($dialog);

        // Move to body via JS to escape tricky z-index contexts
        $script = new TElement('script');
        $script->add("setTimeout(function() { var m = document.getElementById('{$this->uniqueId}'); if(m && m.parentElement !== document.body) { document.body.appendChild(m); } }, 50);");
        $modal->add($script);

        // Put the modal outside to prevent overflow issues usually handled by bootstrap
        parent::add($modal);
        parent::show();
    }
}
