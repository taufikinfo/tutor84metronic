<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STextarea extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('textarea');
        $this->class = 'flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
