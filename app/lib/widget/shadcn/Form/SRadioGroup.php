<?php
namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Form\TRadioGroup;

class SRadioGroup extends TRadioGroup
{
    public function __construct($name = '')
    {
        parent::__construct($name);
        $this->class = 's-radio-group';
        $this->setProperty('role', 'radiogroup');
    }

    public function show()
    {
        // Intercept native Adianti inline styles to enforce Shadcn UI
        $this->setLayout('vertical');
        parent::show();
    }
}
