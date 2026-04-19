<?php
namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Wrapper\TDBRadioGroup;

class SDBRadioGroup extends TDBRadioGroup
{
    public function __construct($name, $database, $model, $key, $value, $ordercolumn = NULL, $criteria = NULL)
    {
        parent::__construct($name, $database, $model, $key, $value, $ordercolumn, $criteria);
        $this->class = 's-radio-group';
        $this->setProperty('role', 'radiogroup');
    }

    public function show()
    {
        $this->setLayout('vertical');
        parent::show();
    }
}
