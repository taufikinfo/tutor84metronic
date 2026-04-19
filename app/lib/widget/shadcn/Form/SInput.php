<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TEntry;

class SInput extends TEntry
{
    public function __construct($name = '', $placeholder = '', $type = 'text')
    {
        parent::__construct($name);
        // Overwrite the default bootstrap class with shadcn class
        $this->class = 's-input';
        
        if ($type !== 'text') {
            $this->setInputType($type);
        }
        
        if ($placeholder) {
            $this->placeholder = $placeholder;
        }
    }

    public function setDisabled($disabled = true)
    {
        parent::setEditable(!$disabled);
        return $this;
    }

    public function setInvalid($invalid = true)
    {
        if ($invalid) {
            $this->setProperty('aria-invalid', 'true');
        } else {
            $this->setProperty('aria-invalid', 'false');
        }
        return $this;
    }

    public function setRequired($required = true)
    {
        if ($required) {
            $this->setProperty('required', 'required');
        }
        return $this;
    }
}
