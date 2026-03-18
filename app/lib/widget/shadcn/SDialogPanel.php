<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDialogPanel extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'modal-content grid w-full gap-4 border bg-background p-6 shadow-lg sm:rounded-lg';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
