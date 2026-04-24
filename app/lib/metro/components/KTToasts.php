<?php
/**
 * KTToasts Metronic Component Wrapper
 */
class KTToasts extends KTComponent
{
    protected $tag = 'div';
    protected $baseClass = 'toast';

    public function __construct() { $this->attr('role', 'alert'); $this->attr('aria-live', 'assertive'); $this->attr('aria-atomic', 'true'); }
}
