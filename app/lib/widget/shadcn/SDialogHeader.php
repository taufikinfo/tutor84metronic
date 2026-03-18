<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDialogHeader extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'modal-header flex flex-col space-y-1.5 text-center sm:text-left border-0 p-0';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
