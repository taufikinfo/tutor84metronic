<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SInputOTP extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'flex items-center gap-2 has-[:disabled]:opacity-50';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
