<?php
namespace App\Lib\Widget\Shadcn\Overlay;
use Adianti\Widget\Base\TElement;
class SDropdownTrigger extends TElement
{
    public function __construct()
    {
        parent::__construct('div');
        $this->style = 'cursor:pointer;display:inline-block;';
        $this->setProperty('onclick', "var dd=this.closest('.s-dropdown');dd.classList.toggle('open');var fn=function(e){if(!dd.contains(e.target)){dd.classList.remove('open');document.removeEventListener('click',fn);}};setTimeout(function(){document.addEventListener('click',fn);},0);");
    }
}
