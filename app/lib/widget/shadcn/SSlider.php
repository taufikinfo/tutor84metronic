<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SSlider extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('input');
        $this->class = 'relative flex w-full touch-none select-none items-center';
        
        $this->type="range"; $this->class.=" form-range";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
