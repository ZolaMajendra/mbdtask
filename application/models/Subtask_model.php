<?php
class Subtask_model extends MY_Model {

	public $table = 'sub_task'; // you MUST mention the table name
    public $primary_key = 'id_subtask'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = FALSE;
        $this->return_as = 'array';
    }

    public function insert_subtask($array){
    	$ret = $this->db->insert_batch('sub_task', $array);
    	return $ret;
    }

}