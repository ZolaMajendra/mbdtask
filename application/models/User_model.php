<?php
class User_model extends MY_Model {

	public $table = 'member__account'; // you MUST mention the table name
    public $primary_key = 'account_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = FALSE;
        $this->return_as = 'array';
    }

}