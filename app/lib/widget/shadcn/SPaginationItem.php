<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SPaginationItem extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('li');
        $this->class = 'page-item';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
