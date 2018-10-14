<?php
class Karyawan_attendance extends MY_Model {

	public $table = 'attendance'; // you MUST mention the table name
    public $primary_key = 'attendance_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->return_as = 'array';
        $this->has_one['profile'] = array('Karyawan_profile','account_id','account_id');
    }

}