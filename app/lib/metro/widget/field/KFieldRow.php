<?php

class KFieldRow
{
    private $schema = [];
    private $css = 'row mb-6';

    public static function make($schema = null)
    {
        $instance = new self();
        if ($schema !== null) {
            // Check if it's a multi-dimensional array mapping (legacy) vs a flat schema array of objects.
            // If the user passes a direct array of elements `KFieldRow::make([$a, $b])`, wrap it to simulate 1 row.
            // Wait, actually `KFieldRow` traditionally iterated `$this->schema` as rows, and `$row` as fields.
            // But if they just pass `[KField::make(...)]`, it's 1 row.
            if (!empty($schema) && is_object(reset($schema))) {
                $instance->schema = [$schema];
            } else {
                $instance->schema = $schema;
            }
        }
        return $instance;
    }

    public function schema($schema)
    {
        $this->schema = $schema;
        return $this;
    }

    public function render()
    {
        $element = new TElement('div');
        $element->{'class'} = $this->css;
        foreach ($this->schema as $row) {
            $rowElement = new TElement('div');
            $rowElement->{'class'} = 'row mb-2';
            foreach ($row as $field) {
                if (method_exists($field, 'renderElements')) {
                    $elements = $field->renderElements();
                    foreach ($elements as $el) {
                        $rowElement->add($el);
                    }
                } else {
                    $rowElement->add($field->render());
                }
            }
            $element->add($rowElement);
        }
        return $element;
    }

    public function getFields()
    {
        $fields = [];
        foreach ($this->schema as $elements) {
            foreach ($elements as $element) {
                if ($element instanceof \Adianti\Widget\Form\TField) {
                    $fields[] = $element;
                } elseif ($element instanceof KFieldSet) {
                    $inner = $element->getField();
                    if ($inner instanceof \Adianti\Widget\Form\TField) {
                        $fields[] = $inner;
                    }
                } elseif ($element instanceof KField) {
                    $inner = $element->getField();
                    if ($inner instanceof \Adianti\Widget\Form\TField) {
                        $fields[] = $inner;
                    }
                } elseif (is_object($element) && method_exists($element, 'getFields')) {
                    $fields = array_merge($fields, $element->getFields());
                }
            }
        }
        return $fields;
    }

    public function class(string $css)
    {
        $this->css = $css;
        return $this;
    }

}