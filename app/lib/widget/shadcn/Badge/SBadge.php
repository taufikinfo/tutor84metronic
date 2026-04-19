<?php
namespace App\Lib\Widget\Shadcn\Badge;
use Adianti\Widget\Base\TElement;

class SBadge extends TElement
{
    public function __construct($value = '', $variant = 'default')
    {
        parent::__construct('span');
        $this->class = 's-badge s-badge-' . $variant;
        if ($value) $this->add($value);
    }
}
