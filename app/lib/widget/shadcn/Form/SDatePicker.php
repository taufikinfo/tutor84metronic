<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TDate;

class SDatePicker extends TDate
{
    public function __construct($name = '')
    {
        parent::__construct($name);
        // Overwrite the default bootstrap class with shadcn class
        $this->class = 's-datepicker';
    }
}
