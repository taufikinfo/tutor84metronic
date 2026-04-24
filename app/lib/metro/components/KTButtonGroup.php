<?php
/**
 * KTButtonGroup Metronic Component Wrapper
 */
class KTButtonGroup extends KTComponent
{
    protected $tag = 'div';
    protected $baseClass = 'btn-group';

    public function __construct() { $this->attr('role', 'group'); }
}
