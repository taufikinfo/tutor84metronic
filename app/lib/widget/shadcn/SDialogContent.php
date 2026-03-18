<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDialogContent extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'modal-dialog modal-dialog-centered sm:max-w-[425px]';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
