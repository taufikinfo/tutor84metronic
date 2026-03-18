<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SNativeSelect extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('select');
        $this->class = 'flex w-full items-center justify-between rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm ring-offset-background focus:outline-none focus:ring-1 focus:ring-ring disabled:cursor-not-allowed disabled:opacity-50';
        
        $this->class.=" form-select";
        
        if ($id) {
            $this->id = $id;
        }
    }
}
