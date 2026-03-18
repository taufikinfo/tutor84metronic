<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SToast extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'pointer-events-auto relative flex w-full items-center justify-between space-x-2 overflow-hidden rounded-md border p-4 pr-8 shadow-lg transition-all';
        
        $this->setProperty("role", "alert"); $this->class.=" toast";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
