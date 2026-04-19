<?php

namespace App\Lib\Widget\Shadcn\Layout;

use Adianti\Widget\Base\TElement;

class SCard extends TElement
{
    private $headerEl;
    private $titleText;
    private $descriptionText;
    private $actionEl;
    private $contentEl;
    private $footerEl;

    public function __construct($size = 'default')
    {
        parent::__construct('div');
        $this->class = 's-card s-background s-border s-radius shadow-sm';
        if ($size === 'sm') {
            $this->class .= ' s-card-sm';
        }
    }

    public function setHeader($title = '', $description = '')
    {
        $this->titleText = $title;
        $this->descriptionText = $description;
        return $this;
    }

    public function setAction(TElement $action)
    {
        $this->actionEl = clone $action;
        return $this;
    }

    public function setContent(TElement $content)
    {
        $this->contentEl = clone $content;
        return $this;
    }

    public function setFooter(TElement $footer)
    {
        $this->footerEl = clone $footer;
        return $this;
    }

    public function show()
    {
        if ($this->titleText || $this->descriptionText || $this->actionEl) {
            $header = new TElement('div');
            $header->class = 's-card-header p-4 pb-0';
            
            $headerContentWrapper = new TElement('div');
            $headerContentWrapper->class = 'd-flex justify-content-between align-items-center w-100';

            $textWrapper = new TElement('div');
            if ($this->titleText) {
                $title = new TElement('h3');
                $title->class = 's-card-title m-0 fw-bold';
                $title->add($this->titleText);
                $textWrapper->add($title);
            }
            if ($this->descriptionText) {
                $desc = new TElement('p');
                $desc->class = 's-card-description text-muted small m-0 mt-1';
                $desc->add($this->descriptionText);
                $textWrapper->add($desc);
            }
            
            $headerContentWrapper->add($textWrapper);

            if ($this->actionEl) {
                $header->style = 'position: relative;';
                $actionWrapper = new TElement('div');
                $actionWrapper->class = 's-card-action';
                $actionWrapper->add($this->actionEl);
                $headerContentWrapper->add($actionWrapper);
            }

            $header->add($headerContentWrapper);
            parent::add($header);
        }

        if ($this->contentEl) {
            $body = new TElement('div');
            $body->class = 's-card-content p-4';
            if (!$this->titleText && !$this->descriptionText) {
                $body->class = 's-card-content p-4 pt-4';
            }
            $body->add($this->contentEl);
            parent::add($body);
        }

        if ($this->footerEl) {
            $footerWrapper = clone $this->footerEl;
            $footerWrapper->class .= ' s-card-footer p-4 pt-0 d-flex align-items-center gap-2';
            parent::add($footerWrapper);
        }

        parent::show();
    }
}
