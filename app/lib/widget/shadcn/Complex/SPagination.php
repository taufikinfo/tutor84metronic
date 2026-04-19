<?php
namespace App\Lib\Widget\Shadcn\Complex;
use Adianti\Widget\Base\TElement;

class SPagination extends TElement
{
    private $pages;
    
    public function __construct()
    {
        parent::__construct('nav');
        $this->pages = [];
    }
    
    public function addPage($label, $active = false, $href = '#')
    {
        $this->pages[] = ['label' => $label, 'active' => $active, 'href' => $href];
        return $this;
    }
    
    public function show()
    {
        $ul = new TElement('ul');
        $ul->class = 's-pagination';
        
        foreach ($this->pages as $page) {
            $li = new TElement('li');
            $li->class = 's-pagination-item';
            $a = new TElement('a');
            $a->class = 's-pagination-link' . ($page['active'] ? ' active' : '');
            $a->href = $page['href'];
            $a->add($page['label']);
            $li->add($a);
            $ul->add($li);
        }
        
        $this->add($ul);
        parent::show();
    }
}
