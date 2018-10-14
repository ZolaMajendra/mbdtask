<?php
class Master_kota extends MY_Model {

	public $table = 'master__kota'; // you MUST mention the table name
    public $primary_key = 'id_kota'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->return_as = 'array';
        $this->timestamps = FALSE;
    }

}