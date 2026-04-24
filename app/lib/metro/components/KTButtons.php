<?php
/**
 * KTButtons Metronic Component Wrapper
 */
class KTButtons extends KTComponent
{
    protected $tag = 'button';
    protected $baseClass = 'btn btn-primary';

    public function __construct($label = '') { $this->add($label); $this->attr('type', 'button'); }
}
