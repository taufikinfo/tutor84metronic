<?php

use Adianti\Widget\Form\TEntry;

class KSearchBox
{
    private $placeholder;
    private $action;

    public static function make($placeholder)
    {
        $instance = new self();
        $instance->placeholder = $placeholder;
        return $instance;
    }

    public function action($action)
    {
        $this->action = $action;
        return $this;
    }

    public function render()
    {
        $input = new TEntry('search');
        $input->placeholder = $this->placeholder;
        $input->class = 'form-control form-control-solid w-250px ps-12';
        $input->setProperty('data-kt-customer-table-filter', 'search');

        if ($this->action) {
            $tAction = new Adianti\Control\TAction($this->action);
            $url = $tAction->serialize();
            $qs = str_replace(['engine.php?', 'index.php?'], '', $url);
            
            // Send search payload when the user presses Enter
            $input->setProperty('onkeydown', "if(event.keyCode == 13) { event.preventDefault(); Adianti.waitMessage = 'Loading...'; __adianti_load_page('engine.php?{$qs}&search=' + encodeURIComponent(this.value)); }");
        }

        $icon = KIcon::make("magnifier")
                ->class("fs-3 position-absolute ms-5");

        $div = new TElement('div');
        $div->{'class'} = 'd-flex align-items-center position-relative my-1';
        $div->add($icon);
        $div->add($input);

        return $div;
    }
}