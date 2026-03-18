<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SItem extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'flex items-center';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
