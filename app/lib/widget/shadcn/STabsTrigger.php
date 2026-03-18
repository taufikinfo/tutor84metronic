<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class STabsTrigger extends TElement
{
    public function __construct($id = null)
    {
        parent::__construct('button');
        $this->class = 'nav-link inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border-0';
        
        $this->setProperty("data-bs-toggle", "tab");
        
        if ($id) {
            $this->id = $id;
        }
    }
}
