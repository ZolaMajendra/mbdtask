<?php
class Salary_model extends MY_Model {

	public $table = 'sikarya__slip_gaji'; // you MUST mention the table name
    public $primary_key = 'slip_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->return_as = 'array';
        $this->has_one['profile'] = array('Karyawan_profile','account_id','account_id');
    }

    public function getSalary($account_id) {
    	$this->db->select("ssg.*, sp.`bank_account`, sp.`bank_name`, sp.`profile_firstname`, sp.`profile_lastname`, ma.`appointment_name`, mb.`branch_name`");
    	$this->db->from("sikarya__slip_gaji ssg");
    	$this->db->join("sikarya__profile sp", "sp.`account_id` = ssg.`account_id`");
    	$this->db->join("master__appointment ma", "ma.`appointment_id` = sp.`appointment_id`");
        $this->db->join("master__branch mb", "mb.`branch_id` = ssg.`branch_id`");
    	$this->db->where("ssg.`account_id`", $account_id);
    	$query = $this->db->get();
    	if($query->num_rows()>0) {
    		return $query->row_array();
    	}
    	return FALSE;
    }

}