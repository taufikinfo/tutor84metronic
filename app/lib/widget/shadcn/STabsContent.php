<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STabsContent extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'tab-content mt-2 ring-offset-background';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
