<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SEmpty extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'flex flex-col items-center justify-center p-8 text-center animate-in fade-in-50';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
