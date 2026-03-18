<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDatePicker extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('input');
        $this->class = 'justify-start text-left font-normal flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors';
        
        $this->type="date"; $this->class.=" form-control";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
