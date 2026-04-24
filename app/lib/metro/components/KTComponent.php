<?php
/**
 * KTComponent Component Base Class
 * Provides fluent interface for Metronic 8 UI elements
 */
use Adianti\Widget\Base\TElement;

abstract class KTComponent
{
    protected $tag = 'div';
    protected $baseClass = '';
    protected $attributes = [];
    protected $children = [];

    /**
     * Factory constructor
     */
    public static function make(...$params)
    {
        return new static(...$params);
    }

    /**
     * Set component tag
     */
    public function tag(string $tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Append a CSS class
     */
    public function class(string $class)
    {
        $this->baseClass .= ' ' . trim($class);
        $this->baseClass = trim($this->baseClass);
        return $this;
    }

    /**
     * Set a custom HTML attribute
     */
    public function attr(string $name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * Add child content or nested components
     */
    public function add($content)
    {
        $this->children[] = $content;
        return $this;
    }

    /**
     * Render as TElement object
     */
    public function render()
    {
        $element = new TElement($this->tag);
        
        if (!empty($this->baseClass)) {
            $element->class = $this->baseClass;
        }

        foreach ($this->attributes as $key => $value) {
            $element->$key = $value;
        }

        foreach ($this->children as $child) {
            if ($child instanceof self) {
                $element->add($child->render());
            } else {
                $element->add($child);
            }
        }

        return $element;
    }

    /**
     * Show element
     */
    public function show()
    {
        $this->render()->show();
    }
}
