<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDrawer extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'fixed inset-x-0 bottom-0 z-50 mt-24 flex h-auto flex-col rounded-t-[10px] border bg-background';
        
        $this->setProperty("tabindex", "-1"); $this->class.=" offcanvas offcanvas-bottom";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
