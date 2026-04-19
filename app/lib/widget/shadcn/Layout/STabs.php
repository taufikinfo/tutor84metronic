<?php

namespace App\Lib\Widget\Shadcn\Layout;

use Adianti\Widget\Base\TElement;

class STabs extends TElement
{
    private $tabs = [];
    private $uniqueId;
    private $variant;

    public function __construct($variant = 'default')
    {
        parent::__construct('div');
        $this->class = 's-tabs w-100';
        $this->uniqueId = 'tabs_' . uniqid();
        $this->variant = $variant;
    }

    public function addTab($id, $label, TElement $content, $isActive = false)
    {
        $this->tabs[] = [
            'id' => $id,
            'label' => $label,
            'content' => clone $content,
            'isActive' => $isActive
        ];
        return $this;
    }

    public function show()
    {
        $uid = $this->uniqueId;
        
        // List Wrapper
        $list = new TElement('div');
        $list->class = 's-tabs-list d-inline-flex flex-wrap align-items-center justify-content-center s-background s-muted p-1 s-radius';
        if ($this->variant === 'line') {
            $list->class = 's-tabs-list-line d-flex border-bottom mb-3';
            $list->style = 'background: transparent; padding: 0;';
        }

        // Content Wrapper
        $contentWrapper = new TElement('div');
        $contentWrapper->class = 's-tabs-contents w-100 mt-2';

        $hasActive = false;
        foreach ($this->tabs as $tab) {
            if ($tab['isActive']) $hasActive = true;
        }
        if (!$hasActive && count($this->tabs) > 0) {
            $this->tabs[0]['isActive'] = true;
        }

        foreach ($this->tabs as $tab) {
            $tabId = $uid . '_' . $tab['id'];
            
            // Trigger Button
            $btn = new TElement('button');
            $btn->class = 's-tabs-trigger border-0 bg-transparent text-muted fw-medium px-3 py-1 s-radius';
            if ($this->variant === 'line') {
                $btn->class = 's-tabs-trigger-line border-0 bg-transparent text-muted fw-medium px-4 py-2 border-bottom border-2 border-transparent';
                $btn->style = 'border-radius: 0;';
            }
            if ($tab['isActive']) {
                $btn->class .= ' active text-dark s-card shadow-sm';
                if ($this->variant === 'line') {
                    $btn->class = str_replace('s-card shadow-sm', 'border-dark text-dark', $btn->class);
                }
            }
            $btn->setProperty('type', 'button');
            $btn->setProperty('role', 'tab');
            $btn->add($tab['label']);
            $btn->setProperty('onclick', "
                var p = this.parentElement;
                Array.from(p.children).forEach(c => {
                    c.classList.remove('active', 'text-dark', 's-card', 'shadow-sm', 'border-dark');
                });
                this.classList.add('active', 'text-dark');
                if('{$this->variant}' === 'default') {
                    this.classList.add('s-card', 'shadow-sm');
                } else {
                    this.classList.add('border-dark');
                }
                var cwrap = this.closest('.s-tabs').querySelector('.s-tabs-contents');
                Array.from(cwrap.children).forEach(c => c.style.display = 'none');
                document.getElementById('{$tabId}_content').style.display = 'block';
            ");
            $list->add($btn);

            // Content Pane
            $pane = new TElement('div');
            $pane->id = $tabId . '_content';
            $pane->class = 's-tabs-content pt-3';
            if (!$tab['isActive']) {
                $pane->style = 'display: none;';
            }
            $pane->add($tab['content']);
            $contentWrapper->add($pane);
        }

        parent::add($list);
        parent::add($contentWrapper);
        parent::show();
    }
}
