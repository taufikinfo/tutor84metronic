<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SDropdownTrigger extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('button');
        $this->class = 'btn inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50';
        
        $this->setProperty("data-bs-toggle", "dropdown");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
