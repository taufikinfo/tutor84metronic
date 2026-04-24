<?php
/**
 * KTPopovers Metronic Component Wrapper
 */
class KTPopovers extends KTComponent
{
    protected $tag = 'button';
    protected $baseClass = 'btn btn-secondary';

    public function __construct($label = '', $content = '') { $this->add($label); $this->attr('data-bs-toggle', 'popover'); $this->attr('data-bs-content', $content); }
}
