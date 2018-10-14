<?php
class Profile_model extends MY_Model {

	public $table = 'member__profile'; // you MUST mention the table name
    public $primary_key = 'profile_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->return_as = 'array';
        $this->has_one['account'] = array('account_model','account_id','account_id');
    }

}