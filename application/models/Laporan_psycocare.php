<?php
class Laporan_psycocare extends MY_Model {

	public $table = 'laporan_psycocare'; // you MUST mention the table name
    public $primary_key = 'laporan_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
        $this->return_as = 'array';
    }

}