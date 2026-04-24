<?php
/**
 * KTTooltips Metronic Component Wrapper
 */
class KTTooltips extends KTComponent
{
    protected $tag = 'button';
    protected $baseClass = 'btn btn-secondary';

    public function __construct($label = '', $title = '') { $this->add($label); $this->attr('data-bs-toggle', 'tooltip'); $this->attr('title', $title); }
}
