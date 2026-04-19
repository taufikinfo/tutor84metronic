<?php
namespace App\Lib\Widget\Shadcn\Complex;
use Adianti\Widget\Base\TElement;

class SBreadcrumb extends TElement
{
    private $items;
    
    public function __construct()
    {
        parent::__construct('nav');
        $this->items = [];
    }
    
    public function addItem($label, $href = '')
    {
        $this->items[] = ['label' => $label, 'href' => $href];
        return $this;
    }
    
    public function show()
    {
        $ol = new TElement('ol');
        $ol->class = 's-breadcrumb';
        
        foreach ($this->items as $i => $item) {
            if ($i > 0) {
                $sep = new TElement('li');
                $sep->class = 's-breadcrumb-separator';
                $sep->add('/');
                $ol->add($sep);
            }
            
            $li = new TElement('li');
            $li->class = 's-breadcrumb-item';
            if ($item['href']) {
                $a = new TElement('a');
                $a->href = $item['href'];
                $a->add($item['label']);
                $li->add($a);
            } else {
                $li->add($item['label']);
            }
            $ol->add($li);
        }
        
        $this->add($ol);
        parent::show();
    }
}
