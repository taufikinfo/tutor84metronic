<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SProgress extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'relative h-2 w-full overflow-hidden rounded-full bg-primary/20';
        
        $this->class.=" progress";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
