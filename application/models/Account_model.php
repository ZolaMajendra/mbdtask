<?php
class Account_model extends MY_Model {

	public $table = 'member__account'; // you MUST mention the table name
    public $primary_key = 'account_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->return_as = 'array';
        $this->has_one['profile'] = array('profile_model','account_id','account_id');
        $this->has_one['branch'] = array('master_branch', 'branch_id', 'branch_id');
        $this->has_one['account_role'] = array('account_role', 'account_id', 'account_id');
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