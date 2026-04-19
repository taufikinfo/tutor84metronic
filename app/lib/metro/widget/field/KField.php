<?php

use Adianti\Widget\Base\TElement;
use Adianti\Widget\Form\TField;
use Adianti\Widget\Form\TLabel;

class KField
{
    private $label;
    private $field;
    private $labelCol = 2;
    private $fieldCol = 10;
    private $wrapperClass = '';

    public static function make($label, $field, $labelCol = 2, $fieldCol = 4)
    {
        $instance = new self();
        $instance->label = ($label instanceof TLabel) ? $label : new TLabel($label);
        $instance->field = $field;
        $instance->labelCol = $labelCol;
        $instance->fieldCol = $fieldCol;
        return $instance;
    }

    public function col($labelCol, $fieldCol)
    {
        $this->labelCol = $labelCol;
        $this->fieldCol = $fieldCol;
        return $this;
    }

    public function class($class)
    {
        $this->wrapperClass = $class;
        return $this;
    }

    public function getField()
    {
        return $this->field;
    }

    public function renderElements()
    {
        $elements = [];

        $labelWrapper = new TElement('div');
        $labelWrapper->{'class'} = "col-sm-{$this->labelCol} d-flex align-items-center justify-content-end"; 
        
        if ($this->label instanceof TLabel) {
            // align-items-center vertically, text-sm-end/justify-content-end horizontally
            $this->label->{'class'} = "col-form-label fw-semibold fs-6 text-sm-end w-100";
            if ($this->wrapperClass) {
                $this->label->{'class'} .= " {$this->wrapperClass}";
            }
            $labelWrapper->add($this->label);
        }

        $elements[] = $labelWrapper;

        $fieldWrapper = new TElement('div');
        $fieldWrapper->{'class'} = "col-sm-{$this->fieldCol}";
        
        if ($this->field instanceof TField) {
            $this->field->class = "form-control form-control-solid";
        }
        $fieldWrapper->add($this->field);
        
        $elements[] = $fieldWrapper;
        
        return $elements;
    }

    public function render()
    {
        // Fallback for single field rendering outside of KFieldRow
        $frag = new TElement('div');
        $frag->{'style'} = 'display: contents;';
        foreach ($this->renderElements() as $el) {
            $frag->add($el);
        }
        return $frag;
    }
}
