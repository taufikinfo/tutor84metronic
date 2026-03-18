<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCheckbox extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('input');
        $this->class = 'peer h-4 w-4 shrink-0 rounded-sm border border-primary shadow focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-primary data-[state=checked]:text-primary-foreground';
        
        $this->type="checkbox"; $this->class.=" form-check-input";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
