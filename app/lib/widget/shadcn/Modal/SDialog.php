<?php

namespace App\Lib\Widget\Shadcn\Modal;

use Adianti\Widget\Base\TElement;

class SDialog extends TElement
{
    private $titleText = '';
    private $descriptionText = '';
    private $triggerEl;
    private $contentEl;
    private $footerEl;
    private $uniqueId;

    public function __construct($id = null)
    {
        $this->uniqueId = $id ?: 'dialog_' . uniqid();
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

        $modal = new TElement('div');
        $modal->class = 'modal fade s-dialog-overlay';
        $modal->id = $this->uniqueId;
        $modal->setProperty('tabindex', '-1');
        $modal->setProperty('aria-hidden', 'true');

        $dialog = new TElement('div');
        $dialog->class = 'modal-dialog modal-dialog-centered';

        $content = new TElement('div');
        $content->class = 'modal-content s-card';
        $content->style = "padding: 1.5rem; position: relative;";

        // Close Button
        $closeBtn = new TElement('button');
        $closeBtn->class = 's-dialog-close';
        $closeBtn->setProperty('data-bs-dismiss', 'modal');
        $closeBtn->add('&times;');
        $content->add($closeBtn);

        $header = new TElement('div');
        $header->class = 's-dialog-header';
        
        if ($this->titleText) {
            $title = new TElement('h2');
            $title->class = 's-dialog-title';
            $title->add($this->titleText);
            $header->add($title);
        }

        if ($this->descriptionText) {
            $desc = new TElement('p');
            $desc->class = 's-dialog-description';
            $desc->add($this->descriptionText);
            $header->add($desc);
        }
        $content->add($header);

        if ($this->contentEl) {
            $body = new TElement('div');
            $body->class = 's-dialog-body mt-3 mb-3';
            $body->add($this->contentEl);
            $content->add($body);
        }

        if ($this->footerEl) {
            $footer = clone $this->footerEl;
            $footer->class .= ' s-dialog-footer';
            $content->add($footer);
        }

        $dialog->add($content);
        $modal->add($dialog);

        // Move to body via JS to escape tricky z-index contexts
        $script = new TElement('script');
        $script->add("setTimeout(function() { var m = document.getElementById('{$this->uniqueId}'); if(m && m.parentElement !== document.body) { document.body.appendChild(m); } }, 50);");
        $modal->add($script);

        parent::add($modal);
        parent::show();
    }
}
