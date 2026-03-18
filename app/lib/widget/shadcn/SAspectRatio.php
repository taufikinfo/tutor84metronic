<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAspectRatio extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'w-full overflow-hidden rounded-md';
        
        $this->setProperty("style", "aspect-ratio: 16 / 9;");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
