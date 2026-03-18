<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

/**
 * Shadcn UI Calendar Wrapper
 */
class SCalendar extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = '';
        
        
        
        if (isset($id) && $id) {
            $this->id = $id;
        }
    }
}
