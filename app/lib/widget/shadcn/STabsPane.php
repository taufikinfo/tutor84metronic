<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STabsPane extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'tab-pane fade';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
