<?php
class Pemasukan_pusat extends MY_Model {

	public $table = 'pemasukan_pusat'; // you MUST mention the table name
    public $primary_key = 'id_pemasukan'; // you MUST mention the primary key
    
    public function __construct()
    {    	
    	parent::__construct();
        $this->soft_deletes = TRUE;
        $this->return_as = 'array';
    }

}