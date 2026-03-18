<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCardContent extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'p-6 pt-0';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
