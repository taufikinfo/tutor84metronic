<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SSeparator extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'shrink-0 bg-border h-[1px] w-full';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
