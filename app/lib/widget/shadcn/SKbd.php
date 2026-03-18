<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SKbd extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('kbd');
        $this->class = 'pointer-events-none inline-flex h-5 select-none items-center gap-1 rounded border bg-muted px-1.5 font-mono text-[10px] font-medium text-muted-foreground opacity-100';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
