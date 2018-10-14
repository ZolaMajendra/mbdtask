<?php
class Master_appointment extends MY_Model {

	public $table = 'master__appointment'; // you MUST mention the table name
    public $primary_key = 'appointment_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->return_as = 'array';
        $this->timestamps = FALSE;
    }

}