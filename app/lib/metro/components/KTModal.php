<?php
/**
 * KTModal Metronic Component Wrapper
 */
class KTModal extends KTComponent
{
    protected $tag = 'div';
    protected $baseClass = 'modal fade';

    public function __construct($id = '') { $this->attr('id', $id); $this->attr('tabindex', '-1'); }
}
