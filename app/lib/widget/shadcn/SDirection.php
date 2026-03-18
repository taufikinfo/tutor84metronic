<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDirection extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'w-full';
        
        $this->setProperty("dir", "rtl");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
