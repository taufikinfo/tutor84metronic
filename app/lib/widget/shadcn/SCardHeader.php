<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCardHeader extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'flex flex-col space-y-1.5 p-6';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
