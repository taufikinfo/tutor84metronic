<?php
/**
 * KTAlerts Metronic Component Wrapper
 */
class KTAlerts extends KTComponent
{
    protected $tag = 'div';
    protected $baseClass = 'alert alert-primary d-flex align-items-center p-5 mb-10';

    public function __construct($message = '') { $this->add($message); }
}
