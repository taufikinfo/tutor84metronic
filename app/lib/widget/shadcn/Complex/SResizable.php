<?php

namespace App\Lib\Widget\Shadcn\Complex;

use Adianti\Widget\Base\TElement;

class SResizable extends TElement
{
    private $panels = [];
    private $orientation;

    public function __construct($orientation = 'horizontal')
    {
        parent::__construct('div');
        $this->orientation = $orientation;
        $this->class = 's-resizable s-border s-radius';
        $this->style = 'display: flex; width: 100%; overflow: hidden; min-height: 200px;';
        if ($orientation === 'vertical') {
            $this->style .= ' flex-direction: column;';
        }
    }

    public function addPanel(TElement $element, $flexBasis = '50%')
    {
        $this->panels[] = [
            'element' => clone $element,
            'basis' => $flexBasis
        ];
        return $this;
    }

    public function show()
    {
        $count = count($this->panels);
        foreach ($this->panels as $index => $panelData) {
            $panel = new TElement('div');
            // We use flexGrow initially 0 to respect initial flex-basis.
            // On drag, JS will flip them to flexGrow ratios.
            $panel->style = "flex-basis: {$panelData['basis']}; flex-grow: 1; overflow: auto; display: flex; align-items: center; justify-content: center; padding: 1rem;";
            $panel->add($panelData['element']);
            
            parent::add($panel);

            // Add Handle if not last
            if ($index < $count - 1) {
                $handle = new TElement('div');
                if ($this->orientation === 'horizontal') {
                    $handle->style = 'width: 6px; background: var(--s-border); position: relative; cursor: col-resize; display: flex; align-items: center; justify-content: center; z-index: 10; flex-shrink: 0; transition: background 0.2s;';
                } else {
                    $handle->style = 'height: 6px; background: var(--s-border); position: relative; cursor: row-resize; display: flex; align-items: center; justify-content: center; z-index: 10; flex-shrink: 0; transition: background 0.2s;';
                }
                $handle->class = 's-resizable-handle';
                
                $grip = new TElement('div');
                $grip->style = 'width: 0.75rem; height: 1.5rem; background: var(--s-border); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--s-muted-foreground); font-size: 0.6rem; user-select: none;';
                if ($this->orientation === 'vertical') {
                    $grip->style .= ' transform: rotate(90deg);';
                }
                $grip->add('⋮');
                
                $handle->add($grip);

                // Javascript Drag Logic
                $js = "
                    var e = event || window.event;
                    e.preventDefault();
                    var handle = this;
                    var prevPanel = handle.previousElementSibling;
                    var nextPanel = handle.nextElementSibling;
                    var dir = '{$this->orientation}';
                    
                    var startPos = dir === 'horizontal' ? e.pageX : e.pageY;
                    var prevStartSize = dir === 'horizontal' ? prevPanel.getBoundingClientRect().width : prevPanel.getBoundingClientRect().height;
                    var nextStartSize = dir === 'horizontal' ? nextPanel.getBoundingClientRect().width : nextPanel.getBoundingClientRect().height;
                    var totalSize = prevStartSize + nextStartSize;
                    
                    document.body.style.userSelect = 'none';
                    handle.style.background = 'var(--s-primary)';
                    handle.querySelector('div').style.background = 'var(--s-primary)';
                    handle.querySelector('div').style.color = 'var(--s-primary-foreground)';
                    
                    var onMouseMove = function(e) {
                        var currPos = dir === 'horizontal' ? e.pageX : e.pageY;
                        var diff = currPos - startPos;
                        var newPrevSize = prevStartSize + diff;
                        var newNextSize = nextStartSize - diff;
                        
                        if (newPrevSize < 50) { newPrevSize = 50; newNextSize = totalSize - 50; }
                        if (newNextSize < 50) { newNextSize = 50; newPrevSize = totalSize - 50; }
                        
                        prevPanel.style.flexGrow = newPrevSize;
                        nextPanel.style.flexGrow = newNextSize;
                        prevPanel.style.flexBasis = '0';
                        nextPanel.style.flexBasis = '0';
                    };
                    
                    var onMouseUp = function() {
                        document.removeEventListener('mousemove', onMouseMove);
                        document.removeEventListener('mouseup', onMouseUp);
                        document.body.style.userSelect = '';
                        handle.style.background = 'var(--s-border)';
                        handle.querySelector('div').style.background = 'var(--s-border)';
                        handle.querySelector('div').style.color = 'var(--s-muted-foreground)';
                    };
                    
                    document.addEventListener('mousemove', onMouseMove);
                    document.addEventListener('mouseup', onMouseUp);
                ";
                $handle->setProperty('onmousedown', $js);

                parent::add($handle);
            }
        }
        parent::show();
    }
}
