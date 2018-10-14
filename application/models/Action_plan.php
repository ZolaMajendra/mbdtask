<?php
class Action_plan extends MY_Model {

	public $table = 'actionplan'; // you MUST mention the table name
    public $primary_key = 'actionplan_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
        $this->return_as = 'array';
    }

}