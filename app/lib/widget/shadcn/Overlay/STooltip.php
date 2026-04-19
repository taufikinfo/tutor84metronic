<?php

namespace App\Lib\Widget\Shadcn\Overlay;

use Adianti\Widget\Base\TElement;

class STooltip extends TElement
{
    private $triggerEl;
    private $tooltipText;
    private $side;

    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-tooltip-wrapper';
        $this->style = 'display: inline-block; position: relative;';
    }

    public function setTrigger(TElement $element)
    {
        $this->triggerEl = clone $element;
        return $this;
    }

    public function setContent($text, $side = 'top')
    {
        $this->tooltipText = $text;
        $this->side = $side;
        return $this;
    }

    public function show()
    {
        if ($this->triggerEl) {
            parent::add($this->triggerEl);
        }

        if ($this->tooltipText) {
            $tip = new TElement('div');
            $tip->class = 's-tooltip';
            
            // Basic CSS-based positioning for side
            $positionStyles = '';
            switch ($this->side) {
                case 'bottom':
                    $positionStyles = 'top: calc(100% + 6px); left: 50%; transform: translateX(-50%);';
                    break;
                case 'right':
                    $positionStyles = 'top: 50%; left: calc(100% + 6px); transform: translateY(-50%);';
                    break;
                case 'left':
                    $positionStyles = 'top: 50%; right: calc(100% + 6px); transform: translateY(-50%); text-align: right;';
                    break;
                case 'top':
                default:
                    $positionStyles = 'bottom: calc(100% + 6px); left: 50%; transform: translateX(-50%);';
                    break;
            }

            $tip->style = "position: absolute; z-index: 1070; padding: 0.375rem 0.75rem; font-size: 0.75rem; color: var(--s-primary-foreground); background: var(--s-primary); border-radius: var(--s-radius); white-space: nowrap; pointer-events: none; opacity: 0; transition: opacity 0.15s; " . $positionStyles;
            $tip->add($this->tooltipText);
            parent::add($tip);
            
            // We use inline CSS for tooltip display on hover, matching what Shadcn.css expects
            // We ensure we inject hover styles. For simplicity, we can inject a quick style tag if needed
            // But actually CSS class .s-tooltip-wrapper:hover .s-tooltip { opacity: 1; } handles it generically!
            // I added those to shadcn.css in my plan, so it will work perfectly.
        }

        parent::show();
    }
}
