<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SSheet extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'fixed z-50 gap-4 bg-background p-6 shadow-lg transition ease-in-out';
        
        $this->setProperty("tabindex", "-1"); $this->class.=" offcanvas offcanvas-end";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
