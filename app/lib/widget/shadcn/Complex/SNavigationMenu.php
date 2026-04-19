<?php
namespace App\Lib\Widget\Shadcn\Complex;
use Adianti\Widget\Base\TElement;

class SNavigationMenu extends TElement
{
    private $links;
    
    public function __construct()
    {
        parent::__construct('nav');
        $this->links = [];
    }
    
    public function addLink($label, $href = '#')
    {
        $this->links[] = ['label' => $label, 'href' => $href];
        return $this;
    }
    
    public function show()
    {
        $ul = new TElement('ul');
        $ul->class = 's-nav-menu';
        
        foreach ($this->links as $link) {
            $li = new TElement('li');
            $li->class = 's-nav-menu-item';
            $a = new TElement('a');
            $a->class = 's-nav-menu-link';
            $a->href = $link['href'];
            $a->add($link['label']);
            $li->add($a);
            $ul->add($li);
        }
        
        $this->add($ul);
        parent::show();
    }
}
