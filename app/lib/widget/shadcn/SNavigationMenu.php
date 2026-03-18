<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SNavigationMenu extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('nav');
        $this->class = 'navbar relative z-10 flex max-w-max flex-1 items-center justify-center';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
