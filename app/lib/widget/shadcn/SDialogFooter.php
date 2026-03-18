<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDialogFooter extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'modal-footer flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 border-0 p-0';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
