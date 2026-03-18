<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCarousel extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'relative';
        
        $this->class.=" carousel slide"; $this->setProperty("data-bs-ride", "carousel");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
