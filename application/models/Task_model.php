<?php
class Task_model extends MY_Model {

	public $table = 'task'; // you MUST mention the table name
    public $primary_key = 'id_task'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = FALSE;
        $this->return_as = 'array';
    }

    public function getrekap($status, $tglmulai, $tglakhir){
    	$res = array();

    	if(empty($tglmulai) && empty($tglakhir)){
    		$tglmulai = date("Y-m-d H:i:s", strtotime("2018-01-01 00:00:00"));
    		$tglakhir = date("Y-m-d H:i:s");
    	}

    	if($status == "TODO"){
    		$this->db->where('created_at >=', $tglmulai);
    		$this->db->where('created_at <=', $tglakhir);
    		$this->db->where('status_task =', 'TO DO');
    		$res = $this->db->get('task')->result_array();
    	}else if ($status == "PROGRESS"){
    		$this->db->where('updated_at >=', $tglmulai);
    		$this->db->where('updated_at <=', $tglakhir);
    		$this->db->where('status_task =', 'IN PROGRESS');
    		$res = $this->db->get('task')->result_array();
    	}else if($status == "DONE"){
    		$this->db->where('updated_at >=', $tglmulai);
    		$this->db->where('updated_at <=', $tglakhir);
    		$this->db->where('status_task =', 'DONE');
    		$res = $this->db->get('task')->result_array();
    	}else{
    		$this->db->where('updated_at >=', $tglmulai);
    		$this->db->where('updated_at <=', $tglakhir);
    		$this->db->where_in('status_task', array('DONE','IN PROGRESS'));
    		$res1 = $this->db->get('task')->result_array();

    		$this->db->where('created_at >=', $tglmulai);
    		$this->db->where('created_at <=', $tglakhir);
    		$this->db->where('status_task =', 'TO DO');
    		$res2 = $this->db->get('task')->result_array();

    		$res = array_merge($res1, $res2);
    	}
    	
    	return $res;
    }

}