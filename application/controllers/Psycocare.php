<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Psycocare extends MY_Controller {

	public function index() {
		$this->load->model("proker_psycocare", "proker");

		$data["_title"] = "Manajemen Program Kerja";
		$data["proker_psycocare"] = $this->proker->get_all();
		$this->add_datatable();
		$this->add_static_js("psycocare_proker.js");
		$this->display("psycocare/list_proker", $data);
	}

	public function add_proker() {
		$data["_title"] = "Tambah Program Kerja";
		$submit = $this->input->post("save_proker");
		if ($submit=='submit') {
			$semester = $this->input->post('selectSemester');
			$thn_ajaran = $this->input->post('thnAjaran');
			$branch 	= $this->session->userdata('branch_id');
			$creator	= $this->session->userdata('account_username');
			if(!empty($_FILES['prokerFile']['name'])) {
				$path 		= $_FILES['prokerFile']['name'];
				$ext 		= pathinfo($path, PATHINFO_EXTENSION);
				$filename	= 'proker-'.$branch.'-'.str_replace('/', '', $thn_ajaran).'-'.$semester.'.'.$ext;

				$config['upload_path']		= './document/proker/';
				$config['allowed_types']	= 'pdf|doc|docx';
				$config['max_size']			= '5120';
				$config['overwrite']		= TRUE;
				$config['file_name']		= $filename;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('prokerFile')) {
					$proker = $this->upload->data('file_name');
				} else {
					$proker = '';
				}
			}

			$this->load->model('proker_psycocare');

			$data_proker = array(
					'branch_id' 		=> $branch,
					'semester' 			=> $semester,
					'thn_ajaran'		=> $thn_ajaran,
					'filename'			=> $proker,
					'created_timestamp'	=> date('Y-m-d H:i:s'),
					'created_by'		=> $creator
				);
			$inserted = $this->proker_psycocare->insert($data_proker);
			if ($inserted) {
				$data["notif"] = array('type'=>'success','message'=>'Data berhasil disimpan');
			} else {
				$data["notif"] = array('type'=>'error', 'message'=>'Data gagal disimpan');
			}
		}
		$this->display("psycocare/add_proker", $data);
	}

	public function report() {
		$this->load->model("laporan_psycocare", "laporan");

		$data["_title"] = "Manajemen Laporan";
		$data["laporan_psycocare"] = $this->laporan->get_all();
		$this->add_datatable();
		$this->add_static_js("psycocare_report.js");
		$this->display("psycocare/list_report", $data);
	}

	public function add_report() {
		$data["_title"] = "Tambah Laporan";
		$submit = $this->input->post("save_report");
		if ($submit=='submit') {
			$month		= $this->input->post('txtBulan');
			$semester 	= $this->input->post('selectSemester');
			$thn_ajaran = $this->input->post('thnAjaran');
			$branch 	= $this->session->userdata('branch_id');
			$creator	= $this->session->userdata('account_username');
			if(!empty($_FILES['reportFile']['name'])) {
				$path 		= $_FILES['reportFile']['name'];
				$ext 		= pathinfo($path, PATHINFO_EXTENSION);
				$filename	= 'report-'.$branch.'-'.date('m', strtotime($month)).str_replace('/', '', $thn_ajaran).'-'.$semester.'.'.$ext;

				$config['upload_path']		= './document/laporan/';
				$config['allowed_types']	= 'pdf|doc|docx';
				$config['max_size']			= '5120';
				$config['overwrite']		= TRUE;
				$config['file_name']		= $filename;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('reportFile')) {
					$report = $this->upload->data('file_name');
				} else {
					$report = '';
				}
			}

			$this->load->model('laporan_psycocare');

			$data_report = array(
					'branch_id' 		=> $branch,
					'month'				=> $month,
					'semester' 			=> $semester,
					'thn_ajaran'		=> $thn_ajaran,
					'filename'			=> $report,
					'created_timestamp'	=> date('Y-m-d H:i:s'),
					'created_by'		=> $creator
				);
			$inserted = $this->laporan_psycocare->insert($data_report);
			if ($inserted) {
				$data["notif"] = array('type'=>'success','message'=>'Data berhasil disimpan');
			} else {
				$data["notif"] = array('type'=>'error', 'message'=>'Data gagal disimpan');
			}
		}
		$this->add_static_js("psycocare_report.js");
		$this->display("psycocare/add_report", $data);
	}
}
