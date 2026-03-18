<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STabsList extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('ul');
        $this->class = 'nav nav-tabs inline-flex h-9 items-center justify-center rounded-lg bg-muted p-1 text-muted-foreground border-0';
        
        $this->setProperty("role", "tablist");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
