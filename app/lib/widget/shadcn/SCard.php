<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SCard extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'rounded-xl border bg-card text-card-foreground shadow';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
