<?php
class Proker_psycocare extends MY_Model {

	public $table = 'proker_psycocare'; // you MUST mention the table name
    public $primary_key = 'proker_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
        $this->return_as = 'array';
    }

}