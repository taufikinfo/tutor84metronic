<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STypography extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('h1');
        $this->class = 'scroll-m-20 text-4xl font-extrabold tracking-tight lg:text-5xl';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
