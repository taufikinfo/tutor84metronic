<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAlertDialog extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'modal fade z-50';
        
        $this->setProperty("tabindex", "-1");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
