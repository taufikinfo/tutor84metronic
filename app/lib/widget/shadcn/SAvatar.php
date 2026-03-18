<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAvatar extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'symbol symbol-circle relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
