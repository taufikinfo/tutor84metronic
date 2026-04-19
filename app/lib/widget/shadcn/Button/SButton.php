<?php

namespace App\Lib\Widget\Shadcn\Button;

use Adianti\Widget\Base\TElement;

class SButton extends TElement
{
    public function __construct($value = '', $variant = 'default', $size = 'default')
    {
        parent::__construct('button');
        $this->setProperty('type', 'button');
        if ($value) $this->add($value);

        $this->class = 's-btn s-btn-' . $variant;

        $sizeMap = [
            'xs'      => ' s-btn-xs',
            'sm'      => ' s-btn-sm',
            'lg'      => ' s-btn-lg',
            'icon'    => ' s-btn-icon',
            'icon-xs' => ' s-btn-icon s-btn-icon-xs',
            'icon-sm' => ' s-btn-icon s-btn-icon-sm',
            'icon-lg' => ' s-btn-icon s-btn-icon-lg',
        ];

        if (isset($sizeMap[$size])) {
            $this->class .= $sizeMap[$size];
        }
    }

    public function setDisabled($disabled = true)
    {
        if ($disabled) {
            $this->setProperty('disabled', 'disabled');
        }
        return $this;
    }

    public function setRounded($rounded = true)
    {
        if ($rounded) {
            $this->class .= ' s-btn-rounded';
        }
        return $this;
    }
}
