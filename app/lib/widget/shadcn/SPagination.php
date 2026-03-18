<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SPagination extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('nav');
        $this->class = 'mx-auto flex w-full justify-center';
        
        $this->class.=" pagination";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
