<?php
class Master_branch extends MY_Model {

	public $table = 'master__branch'; // you MUST mention the table name
    public $primary_key = 'branch_id'; // you MUST mention the primary key
    
    public function __construct()
    {
        parent::__construct();
        $this->return_as = 'array';
        $this->timestamps = FALSE;
        $this->has_one['city'] = array('foreign_model'=>'Master_kota','foreign_table'=>'master__kota','foreign_key'=>'id_kota','local_key'=>'id_kota');
    }

}