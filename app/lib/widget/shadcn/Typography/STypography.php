<?php

namespace App\Lib\Widget\Shadcn\Typography;

use Adianti\Widget\Base\TElement;

class STypography extends TElement
{
    public function __construct($value = '', $variant = 'h1')
    {
        $tags = ['h1' => 'h1', 'h2' => 'h2', 'h3' => 'h3', 'h4' => 'h4', 'p' => 'p', 'muted' => 'p', 'destructive' => 'p'];
        parent::__construct($tags[$variant] ?? 'h1');
        $this->class = 's-typography-' . $variant;
        if ($value) $this->add($value);
    }
}
