<?php

class Perangkat extends TRecord
{
    const TABLENAME = 'perangkat';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('kode_barang');
        parent::addAttribute('nama_barang');
        parent::addAttribute('merek');
        parent::addAttribute('kondisi');
        parent::addAttribute('nup');
        parent::addAttribute('tgl_perolehan');
        parent::addAttribute('nilai_perolehan');
        parent::addAttribute('status');
    }
}
