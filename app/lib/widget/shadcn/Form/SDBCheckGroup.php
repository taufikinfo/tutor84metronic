<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Wrapper\TDBCheckGroup;

class SDBCheckGroup extends TDBCheckGroup
{
    public function __construct($name, $database, $model, $key, $value, $ordercolumn = NULL, $criteria = NULL)
    {
        parent::__construct($name, $database, $model, $key, $value, $ordercolumn, $criteria);
        // Overwrite the default bootstrap class with shadcn wrapper class
        $this->class = ''; 
    }

    public function show()
    {
        $this->setLayout('vertical');
        parent::show();
    }
}
