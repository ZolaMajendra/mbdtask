<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends MY_Controller {


	public function pendaftaran() {
		$this->load->helper('form');
		$this->load->model("tiket_model", "tiket");
		$this->load->model("user_model", "user");
		$data["_title"] = "Perekaman Pekerjaan";
		$msg = $this->session->flashdata('res');

		$init_tiket = array("--Pilih Jenis Tiket--");
		$res_tiket = $this->tiket->as_dropdown('jenis_tiket')->get_all();
		$data["tiket"] = array_merge($init_tiket, $res_tiket);

		$init_user = array("--Pilih Asignee--");
		$res_user = $this->user->as_dropdown('account_username')->get_all();
		$data["user"] = array_merge($init_user, $res_user);

		if($msg){
			$data['notif'] = array('type' => 'success', 'message' => 'Data berhasil dimasukkan');
		}
		if(!$msg && !empty($msg)){
			$data['notif'] = array('type' => 'error', 'message' => 'Data gagal dimasukkan');
		}
		
		$this->add_static_css("dashboard.css");
		$this->display("task/form_pendaftaran", $data);
	}

	public function tambahtask(){
		$this->load->model('task_model', 'task');
		$this->load->model('subtask_model', 'subtask');
		$data["_title"] = "Pendaftaran Siswa";

		$input = array('asignee' 		 	=> $this->input->post('asignee'),
						'nomor_tiket'		=> !empty($this->input->post('notiket')) ? $this->input->post('notiket') : '-',
						'status_task' 	 	=> 'TO DO',						
						'deskripsi'			=> $this->input->post('desctiket'),
						'created_by' 	    => $this->session->userdata('account_username')
						);

		if(!$this->task->insert($input)){
			$this->session->set_flashdata('res', 0);
			redirect('task/pendaftaran');
		}
		else{
			$id_task = $this->db->insert_id();
			$namesubtask = $this->input->post('subtask');
			$descsubtask = $this->input->post('descsubtask');
			$i=0;

			if(sizeof($namesubtask)>0){
				foreach ($namesubtask as $key => $value) {
					$input_stask[$i]['id_task'] = $id_task;
					$input_stask[$i]['judul_subtask'] = $namesubtask[$key];
					$input_stask[$i]['deskripsi'] = $descsubtask[$key];
					$i++;
				}
				$this->subtask->insert_subtask($input_stask);	
			}
			
			$this->session->set_flashdata('res', 1);
			redirect('task/pendaftaran');
		}
	}

	public function listtask() {
		$this->load->model('task_model', 'task');
		$data["_title"] = "List Pekerjaan";
		$status = !empty($this->input->get('status')) ? $this->input->get('status') : '';

		switch ($status) {
			case 'TODO':
				$status_task = 'TO DO';
				$data['task'] = $this->task->where('status_task', $status_task)->get_all();
				break;

			case 'PROGRESS':
				$status_task = 'IN PROGRESS';
				$data['task'] = $this->task->where('status_task', $status_task)->get_all();
				break;

			case 'DONE':
				$status_task = 'DONE';
				$data['task'] = $this->task->where('status_task', $status_task)->get_all();
				break;
			
			default:
				$data['task'] = $this->task->get_all();
				$status = '';
				break;
		}

		
		//var_dump($data['task']);die();
		$data['status'] = $status;
		$this->add_datatable();
		$this->add_static_js("account_management.js");
		$flash = $this->session->flashdata('res');

		if(!empty($flash)){
				$data['message'] = $flash;
		}
		
		$this->display("task/list_task", $data);
	}

	public function getsubtask(){
		$this->load->model('subtask_model', 'subtask');
		$data["_title"] = "List Sub Task Pekerjaan";
		$idtask = !empty($this->input->get('idtask')) ? $this->input->get('idtask') : '';
		$data['status'] = !empty($this->input->get('status')) ? $this->input->get('status') : '';

		$data['subtask'] = $this->subtask->where('id_task', $idtask)->get_all();
		$data['idtask'] = $idtask;
		$this->add_datatable();
		$this->add_static_js("account_management.js");

		$flash = $this->session->flashdata('res');
		$data['message'] = $flash;

		$this->display("task/list_subtask", $data);
	}

	public function updatetask(){
		$this->load->model('task_model', 'task');
		$data["_title"] = "Edit Data task";

		$id_task = !empty($this->input->get('idtask')) ? $this->input->get('idtask') : '';
		$status = !empty($this->input->get('status')) ? $this->input->get('status') : '';

		switch ($status) {
			case 'TODO':
				$next = 'IN PROGRESS';
				break;

			case 'PROGRESS':
				$next = 'DONE';
				break;

			case 'DONE':
				
				break;
			
			default:
				
				break;
		}

		$input = array('status_task' 	 	=> $next,
						'updated_at' 	    => date('Y-m-d H:i:s'),
						'updated_by' 	    => $this->session->userdata('account_username')
						);

		if($this->task->where('id_task', $id_task)->update($input)){
			$this->session->set_flashdata('res', 1);
			redirect('task/listtask?status='.$status);
		}
		else{
			$this->session->set_flashdata('res', 0);
			redirect('task/listtask?status='.$status);
		}

	}

	public function rekap(){
		$this->load->model('task_model', 'task');
		$data["_title"] = "List Pekerjaan";
		$status = !empty($this->input->get('status')) ? $this->input->get('status') : '';
		$tglmulai = !empty($this->input->get('tglmulai')) ? $this->input->get('tglmulai') : '';
		$tglakhir = !empty($this->input->get('tglakhir')) ? $this->input->get('tglakhir') : '';

		$data['mulai'] = $tglmulai;
		$data['akhir'] = $tglakhir;

		if(!empty($tglmulai) && !empty($tglakhir)){
			$tglmulai = date("Y-m-d 00:00:00", strtotime($tglmulai));
			$tglakhir = date("Y-m-d 23:59:59", strtotime($tglakhir));
		}

		switch ($status) {
			case 'TODO':
				$status_task = 'TO DO';
				$data['nextbtn'] = '<span class="icon icon-signal"></span>';
				$data['btntitle'] = 'Ubah ke "IN PROGRESS"';
				$data['btnclass'] = 'btn-warning';
				break;

			case 'PROGRESS':
				$status_task = 'IN PROGRESS';
				$data['nextbtn'] = '<span class="icon icon-ok-circle"></span>';
				$data['btntitle'] = 'Ubah ke "DONE"';
				$data['btnclass'] = 'btn-success';
				break;

			case 'DONE':
				$status_task = 'DONE';
				$data['nextbtn'] = '<span class="icon icon-ok-circle"></span>';
				$data['btntitle'] = 'Ubah ke "DONE"';
				$data['btnclass'] = 'btn-success';
				break;
			
			default:
				$status_task = 'TO DO';
				$data['nextbtn'] = '<span class="icon icon-signal"></span>';
				$data['btntitle'] = 'Ubah ke "IN PROGRESS"';
				$data['btnclass'] = 'btn-warning';
				break;
		}

		$data['task'] = $this->task->getrekap($status, $tglmulai, $tglakhir);
		$data['status'] = $status;
		$this->add_datatable();
		$this->add_static_js("account_management.js");
		$flash = $this->session->flashdata('res');

		if(!empty($flash)){
				$data['message'] = $flash;
		}
		
		$this->display("task/rekap_task", $data);
	}

	public function filesubtask(){
		$data["_title"] = "Upload File";
		$this->load->model('subtask_model', 'subtask');
		$idtask = !empty($this->input->get('idtask')) ? $this->input->get('idtask') : '';
		$idsubtask = !empty($this->input->get('idsubtask')) ? $this->input->get('idsubtask') : '';

		$data['status'] = !empty($this->input->get('status')) ? $this->input->get('status') : '';
		$data['subtask'] = $this->subtask->where('id_subtask', $idsubtask)->get();
		$data['idtask']	 = $idtask;
		$data['idsubtask'] = $idsubtask;

		$this->add_static_css("dashboard.css");
		$this->display("task/form_upload", $data);
	}

	public function allusers(){
		$this->load->model('user_model', 'user');
		$kode = $this->input->post('kode');
		$hsl = $this->user->where('account_username LIKE', '%'.$kode.'%')->get_all();
		$data = array();
		foreach ($hsl as $key => $value) {
			$res['value'] = $value['account_username'];
			$data[] = $res;
		}
		echo json_encode($data);
	}

	public function simpanfile(){
		$data["_title"] = "Upload File";
		$this->load->model('subtask_model', 'subtask');

		$idsubtask = !empty($this->input->post('idsubtask')) ? $this->input->post('idsubtask') : '';
		$idtask = !empty($this->input->post('idtask')) ? $this->input->post('idtask') : '';

		if(!empty($_FILES['subtaskfile']['name'])) {
			$path 		= $_FILES['subtaskfile']['name'];
			$ext 		= pathinfo($path, PATHINFO_EXTENSION);
			$filename	= 'subtask'.$idsubtask.date(date('YmdHis')).'.'.$ext;

			$config['upload_path']		= './document/';
			$config['allowed_types']	= 'jpg|jpeg|png';
			$config['max_size']			= '5120';
			$config['overwrite']		= TRUE;
			$config['file_name']		= $filename;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('subtaskfile')) {
				$report = $this->upload->data('file_name');
			} else {
				$report = '';
				$this->session->set_flashdata('res', 0);
				redirect('task/getsubtask?idtask='.$idtask);
				break;
			}

			$data_update = array(
					'url_file' 		=> $report,
					'updated_at'	=> date('Y-m-d H:i:s'),
					'updated_by'	=> $this->session->userdata('account_username')
			);
			
			if($this->subtask->where('id_subtask', $idsubtask)->update($data_update)){
				$this->session->set_flashdata('res', 1);
				redirect('task/getsubtask?idtask='.$idtask);
			}
			else{
				$this->session->set_flashdata('res', 0);
				redirect('task/getsubtask?idtask='.$idtask);
			}
		}
	}

	public function hapustask(){
		$this->load->model('task_model', 'task');
		$id_task = !empty($this->input->get('idtask')) ? $this->input->get('idtask') : '';
		$status = !empty($this->input->get('status')) ? $this->input->get('status') : '';

		if(!empty($id_task)){
			if($this->task->where('id_task', $id_task)->delete()){
				$this->session->set_flashdata('res', 1);
				redirect('task/listtask?status='.$status);
			}
			else{
				$this->session->set_flashdata('res', 0);
				redirect('task/listtask?status='.$status);
			}			
		}
	}

	public function hapussubtask(){
		$this->load->model('subtask_model', 'subtask');
		$id_subtask = !empty($this->input->get('idsubtask')) ? $this->input->get('idsubtask') : '';
		$idtask = !empty($this->input->get('idtask')) ? $this->input->get('idtask') : '';
		$status = !empty($this->input->get('status')) ? $this->input->get('status') : '';

		if(!empty($id_subtask)){
			if($this->subtask->where('id_subtask', $id_subtask)->delete()){
				$this->session->set_flashdata('res', 1);
				redirect('task/getsubtask?idtask='.$idtask.'&status='.$status);
			}
			else{
				$this->session->set_flashdata('res', 0);
				redirect('task/getsubtask?idtask='.$idtask.'&status='.$status);
			}			
		}
	}

	public function edittask(){
		$this->load->helper('form');
		$data["_title"] = "Sunting Pekerjaan";
		$this->load->model('task_model', 'task');
		$id_task = !empty($this->input->get('idtask')) ? $this->input->get('idtask') : '';
		$data['status'] = !empty($this->input->get('status')) ? $this->input->get('status') : '';

		$data['task'] = $this->task->where('id_task', $id_task)->get();

		if($this->session->flashdata('res')){
			$data['notif'] = array('type' => 'success', 'message' => 'Data berhasil disunting');
		}
		if(!$this->session->flashdata('res') && !empty($this->session->flashdata('res'))){
			$data['notif'] = array('type' => 'error', 'message' => 'Data gagal disunting');
		}

		$this->display('task/form_edittask', $data);

	}

	public function ubahtask(){
		$this->load->model('task_model', 'task');
		$id_task = !empty($this->input->post('idtask')) ? $this->input->post('idtask') : '';
		$status = !empty($this->input->post('status')) ? $this->input->post('status') : '';

		$input = array('nomor_tiket' 	=> $this->input->post('notiket'),
						'asignee'		=> $this->input->post('asignee'),
						'deskripsi'		=> $this->input->post('desctiket'));

		if(!empty($id_task)){
			if($this->task->update($input, $id_task)){
				$this->session->set_flashdata('res', 1);
				redirect('task/listtask?status='.$status);
			}
			else{
				$this->session->set_flashdata('res', 0);
				redirect('task/listtask?status='.$status);
			}			
		}
	}

	public function editsubtask(){
		$this->load->helper('form');
		$data["_title"] = "Sunting Sub Pekerjaan";
		$this->load->model('subtask_model', 'subtask');
		$id_subtask = !empty($this->input->get('idsubtask')) ? $this->input->get('idsubtask') : '';
		$data['status'] = !empty($this->input->get('status')) ? $this->input->get('status') : '';

		$data['subtask'] = $this->subtask->where('id_subtask', $id_subtask)->get();

		if($this->session->flashdata('res')){
			$data['notif'] = array('type' => 'success', 'message' => 'Data berhasil disunting');
		}
		if(!$this->session->flashdata('res') && !empty($this->session->flashdata('res'))){
			$data['notif'] = array('type' => 'error', 'message' => 'Data gagal disunting');
		}

		$this->display('task/form_editsubtask', $data);
	}

	public function ubahsubtask(){
		$this->load->model('subtask_model', 'subtask');
		$id_subtask = !empty($this->input->post('idsubtask')) ? $this->input->post('idsubtask') : '';
		$id_task = !empty($this->input->post('idtask')) ? $this->input->post('idtask') : '';
		$status = !empty($this->input->post('status')) ? $this->input->post('status') : '';

		$input = array('judul_subtask' 	=> $this->input->post('subtask'),
						'deskripsi'		=> $this->input->post('descsubtask'));

		if(!empty($id_subtask)){
			if($this->subtask->update($input, $id_subtask)){
				$this->session->set_flashdata('res', 1);
				redirect('task/getsubtask?idtask='.$id_task.'&status='.$status);
			}
			else{
				$this->session->set_flashdata('res', 0);
				redirect('task/getsubtask?idtask='.$id_task.'&status='.$status);
			}			
		}
	}

	public function tambahsubtask(){
		$data["_title"] = "Tambah Sub Pekerjaan";
		$data['id_task'] = !empty($this->input->get('idtask')) ? $this->input->get('idtask') : '';

		$this->display('task/form_tambahsubtask', $data);
	}

	public function simpansubtask(){
		$this->load->model('subtask_model', 'subtask');
		$id_task = !empty($this->input->post('idtask')) ? $this->input->post('idtask') : '';

		$namesubtask = $this->input->post('subtask');
		$descsubtask = $this->input->post('descsubtask');
		$i=0;

		if(sizeof($namesubtask)>0){
			foreach ($namesubtask as $key => $value) {
				$input_stask[$i]['id_task'] = $id_task;
				$input_stask[$i]['judul_subtask'] = $namesubtask[$key];
				$input_stask[$i]['deskripsi'] = $descsubtask[$key];
				$i++;
			}
			$this->subtask->insert_subtask($input_stask);
			$this->session->set_flashdata('res', 1);
		}
		
		redirect('task/getsubtask?idtask='.$id_task);
	}

	public function index() {
		redirect("task/pendaftaran");
	}
}
