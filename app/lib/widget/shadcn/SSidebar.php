<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SSidebar extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('aside');
        $this->class = 'flex h-full w-[250px] flex-col border-r bg-background';
        
        
        
        if ($id) {
            $this->id = $id;
        }
    }
}
