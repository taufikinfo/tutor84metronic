<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SBadge extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
