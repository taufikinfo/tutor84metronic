<?php
/**
 * KTBadges Metronic Component Wrapper
 */
class KTBadges extends KTComponent
{
    protected $tag = 'span';
    protected $baseClass = 'badge badge-primary';

    public function __construct($label = '') { $this->add($label); }
}
