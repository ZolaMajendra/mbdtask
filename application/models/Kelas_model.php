<?php
class Kelas_model extends MY_Model {

	public $table = 'master__kelas'; // you MUST mention the table name
    public $primary_key = 'id_kelas'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = FALSE;
        $this->return_as = 'array';
    }

}