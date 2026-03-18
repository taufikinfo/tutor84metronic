<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SRadio extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('input');
        $this->class = 'aspect-square h-4 w-4 rounded-full border border-primary text-primary shadow focus:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50';
        
        $this->type="radio"; $this->class.=" form-check-input";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
