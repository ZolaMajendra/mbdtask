<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends MY_Controller {

	public function index() {
		$this->load->model("action_plan", "plan");

		$data["_title"] = "Manajemen Action Plan";
		$data["action_plans"] = $this->plan->get_all();
		$this->add_datatable();
		$this->add_static_js("marketing_actionplan.js");
		$this->display("marketing/list_actionplan", $data);
	}

	public function add_actionplan() {
		$data["_title"] = "Tambah Action Plan";
		$submit = $this->input->post("save_plan");
		if ($submit=='submit') {
			$month 		= $this->input->post('txtBulan');
			$semester 	= $this->input->post('selectSemester');
			$thn_ajaran = $this->input->post('thnAjaran');
			$branch 	= $this->session->userdata('branch_id');
			$creator	= $this->session->userdata('account_username');
			if(!empty($_FILES['planFile']['name'])) {
				$path 		= $_FILES['planFile']['name'];
				$ext 		= pathinfo($path, PATHINFO_EXTENSION);
				$filename	= 'plans-'.$branch.'-'.date('m', strtotime($month)).str_replace('/', '', $thn_ajaran).'-'.$semester.'.'.$ext;

				$config['upload_path']		= './document/plans/';
				$config['allowed_types']	= 'pdf|doc|docx';
				$config['max_size']			= '5120';
				$config['overwrite']		= TRUE;
				$config['file_name']		= $filename;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('planFile')) {
					$proker = $this->upload->data('file_name');
				} else {
					$proker = '';
				}
			}

			$this->load->model("action_plan", "plan");

			$data_proker = array(
					'branch_id' 		=> $branch,
					'month'				=> $month,
					'semester' 			=> $semester,
					'thn_ajaran'		=> $thn_ajaran,
					'filename'			=> $proker,
					'created_timestamp'	=> date('Y-m-d H:i:s'),
					'created_by'		=> $creator
				);
			$inserted = $this->plan->insert($data_proker);
			if ($inserted) {
				$data["notif"] = array('type'=>'success','message'=>'Data berhasil disimpan');
			} else {
				$data["notif"] = array('type'=>'error', 'message'=>'Data gagal disimpan');
			}

		}
		$this->add_static_js("marketing_actionplan.js");
		$this->display("marketing/add_actionplan", $data);
	}

	public function student_monitor() {
		$data["_title"] = "Jumlah Siswa";

		$this->load->model("siswa_model", "siswa");		
		$data["data_siswa"] = $this->siswa->jml_siswa_by_kelas();

		$this->display("marketing/jumlah_siswa", $data);
	}
}
