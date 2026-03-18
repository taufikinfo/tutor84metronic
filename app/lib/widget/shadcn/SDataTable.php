<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDataTable extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'rounded-md border';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
