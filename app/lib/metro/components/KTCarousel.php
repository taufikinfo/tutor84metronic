<?php
/**
 * KTCarousel Metronic Component Wrapper
 */
class KTCarousel extends KTComponent
{
    protected $tag = 'div';
    protected $baseClass = 'carousel slide';

    public function __construct($id = '') { $this->attr('id', $id); $this->attr('data-bs-ride', 'carousel'); }
}
