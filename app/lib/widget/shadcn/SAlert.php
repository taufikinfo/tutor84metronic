<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SAlert extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('div');
        $this->class = 'alert relative w-full rounded-lg border p-4 [&>svg~*]:pl-7 [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg]:text-foreground bg-background text-foreground';
        
        $this->setProperty("role", "alert");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
