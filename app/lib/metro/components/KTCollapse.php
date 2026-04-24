<?php
/**
 * KTCollapse Metronic Component Wrapper
 */
class KTCollapse extends KTComponent
{
    protected $tag = 'div';
    protected $baseClass = 'collapse';

    public function __construct($id = '') { $this->attr('id', $id); }
}
