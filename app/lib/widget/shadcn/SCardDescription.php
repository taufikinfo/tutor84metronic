<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCardDescription extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('p');
        $this->class = 'text-sm text-muted-foreground';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
