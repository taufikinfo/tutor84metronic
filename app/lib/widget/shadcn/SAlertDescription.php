<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAlertDescription extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'text-sm [&_p]:leading-relaxed';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
