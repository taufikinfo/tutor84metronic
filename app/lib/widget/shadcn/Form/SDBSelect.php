<?php

namespace App\Lib\Widget\Shadcn\Form;

use Adianti\Widget\Wrapper\TDBCombo;

class SDBSelect extends TDBCombo
{
    public function __construct($name, $database, $model, $key, $value, $ordercolumn = NULL, $criteria = NULL)
    {
        parent::__construct($name, $database, $model, $key, $value, $ordercolumn, $criteria);
        // Overwrite the default bootstrap class with shadcn class
        $this->class = 's-select'; 
    }
}
