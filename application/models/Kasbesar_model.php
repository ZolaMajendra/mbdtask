<?php
class Kasbesar_model extends MY_Model {

	public $table = 'kas_besar'; // you MUST mention the table name
    public $primary_key = 'id_kb'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->soft_deletes = FALSE;
        $this->return_as = 'array';
    }

    public function get_kas_besar($tgl){
    	$query = "SELECT kb.tgl_kb, SUM(kb.pemasukan_bimbel) AS p_bimbel, SUM(kb.pemasukan_pusat) AS p_pusat, 
                    SUM(kb.pengeluaran) AS pengeluaran, SUM(kb.pengisian) AS pengisian,
                    SUM(kb.setor) AS setor, kb.setor_kepada 
                        FROM kas_besar kb
                        WHERE tgl_kb = ?
                        GROUP BY tgl_kb";

		$result = $this->db->query($query, array($tgl));
		return $result->row_array();
    }

}