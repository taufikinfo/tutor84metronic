<?php
/**
 * KTScrollspy Metronic Component Wrapper
 */
class KTScrollspy extends KTComponent
{
    protected $tag = 'div';
    protected $baseClass = 'scrollspy-example';

    public function __construct() { $this->attr('data-bs-spy', 'scroll'); }
}
