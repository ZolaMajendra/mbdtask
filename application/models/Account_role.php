<?php
class Account_role extends MY_Model {

	public $table = 'sys__auth_account_role'; // you MUST mention the table name
    public $primary_key = 'role_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
        $this->return_as = 'array';
        $this->has_one["auth_role"] = array("auth_role", "role_id", "role_id");       
    }
}