<?php
class Karyawan_account extends MY_Model {

	public $table = 'sikarya__account'; // you MUST mention the table name
    public $primary_key = 'account_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->return_as = 'array';
        
    }

    public function get_id() {
    	$this->db->select_max($this->primary_key);
    	$result = $this->db->get($this->table);
    	if($result->num_rows() > 0) {
    		return $result->row()->{$this->primary_key} + 1;
    	} else {
    		return 1;
    	}
    }

}