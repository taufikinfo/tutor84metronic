<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SBreadcrumb extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('ol');
        $this->class = 'breadcrumb flex flex-wrap items-center gap-1.5 break-words text-sm text-muted-foreground sm:gap-2.5';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
