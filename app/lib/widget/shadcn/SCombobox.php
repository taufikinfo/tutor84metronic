<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCombobox extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('select');
        $this->class = 'flex w-full items-center rounded-md border border-input bg-transparent text-sm';
        
        $this->setProperty("data-control", "select2"); $this->class.=" form-select";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
