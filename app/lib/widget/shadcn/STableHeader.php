<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STableHeader extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('thead');
        $this->class = '[&_tr]:border-b';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
