<?php

namespace App\Lib\Widget\Shadcn\Feedback;

use Adianti\Widget\Base\TElement;

class SSkeleton extends TElement
{
    public function __construct($width = '100%', $height = '20px')
    {
        parent::__construct('div');
        $this->class = 's-skeleton';
        $this->style = "width:{$width};height:{$height}";
    }
}
