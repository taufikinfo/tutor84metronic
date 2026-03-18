<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SSwitch extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('input');
        $this->class = 'peer inline-flex h-[20px] w-[36px] shrink-0 cursor-pointer items-center rounded-full border-2 border-transparent shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:ring-offset-background disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-primary data-[state=unchecked]:bg-input';
        
        $this->type="checkbox"; $this->setProperty("role", "switch"); $this->class.=" form-check-input";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
