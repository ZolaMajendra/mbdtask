<?php
class Siswa_model extends MY_Model {

	public $table = 'profil_siswa'; // you MUST mention the table name
    public $primary_key = 'id_siswa'; // you MUST mention the primary key
    
    public function __construct()
    {    	
    	$this->has_many['kelas'] = array('foreign_model'=>'Kelas_model','foreign_table'=>'master__kelas','foreign_key'=>'id_kelas','local_key'=>'id_kelas');
        parent::__construct();
        $this->soft_deletes = TRUE;
        $this->return_as = 'array';
    }

    public function jml_siswa_by_kelas(){
    	$sql = "SELECT COUNT(a.id_siswa) AS jumlah_siswa, a.kelas FROM profil_siswa a GROUP BY a.kelas";
    	$result = $this->db->query($sql);

    	return $result->result_array();
    }

}