<?php

use Adianti\Database\TRecord;

class Tickets extends TRecord
{
    const TABLENAME = 'tickets';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max'; // {max, serial}

    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('subject');
        parent::addAttribute('product');
        parent::addAttribute('status_progress');
        parent::addAttribute('perangkat_id');
    }
}
