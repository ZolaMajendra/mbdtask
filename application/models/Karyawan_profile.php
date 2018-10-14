<?php
class Karyawan_profile extends MY_Model {

	public $table = 'sikarya__profile'; // you MUST mention the table name
    public $primary_key = 'profile_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->return_as = 'array';
        $this->has_one['account'] = array('Karyawan_account','account_id','account_id');
        $this->has_one['appointment'] = array('Master_appointment', 'appointment_id', 'appointment_id');
    }

}