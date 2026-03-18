<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STable extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('table');
        $this->class = 'w-full caption-bottom text-sm';
        
        $this->class.=" table";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
