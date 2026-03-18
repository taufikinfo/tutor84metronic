<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STableRow extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('tr');
        $this->class = 'border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
