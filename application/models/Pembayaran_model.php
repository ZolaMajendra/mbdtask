<?php
class Pembayaran_model extends MY_Model {

	public $table = 'pembayaran_siswa'; // you MUST mention the table name
    public $primary_key = 'id_pembayaran'; // you MUST mention the primary key
    
    public function __construct()
    {
    	$this->has_many['siswa'] = array('foreign_model'=>'Siswa_model','foreign_table'=>'profil_siswa','foreign_key'=>'id_siswa','local_key'=>'id_siswa');
        parent::__construct();
        $this->soft_deletes = FALSE;
        $this->return_as = 'array';
    }

    public function get_lap_harian($tgl){
    	$sql = "SELECT 
				  SUM(jumlah) AS pendapatan, pes.tgl_pembayaran, prs.kelas
				FROM
				  pembayaran_siswa pes
				  JOIN profil_siswa prs
				    ON pes.id_siswa = prs.id_siswa
				WHERE pes.jenis != 'NULL' AND pes.tgl_pembayaran = '$tgl'
				GROUP BY pes.tgl_pembayaran,prs.kelas;";
		$result = $this->db->query($sql);
		//var_dump($result->result_array());die();
		return $result->result_array();
    }

}