<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SBreadcrumbItem extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('li');
        $this->class = 'breadcrumb-item inline-flex items-center gap-1.5';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
