<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SSpinner extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'text-primary inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-r-transparent align-[-0.125em]';
        
        $this->setProperty("role", "status"); $this->class.=" spinner-border";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
