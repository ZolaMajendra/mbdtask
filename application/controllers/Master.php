<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

	public function index() {
		$this->load->model("master_branch", "branch");

		$data["_title"] = "Manajemen Cabang";
		$role = $this->session->userdata("account_role");
		$data["branches"] = $this->branch->with_city('fields:nama_kota')->get_all();
		
		$this->add_datatable();
		$this->add_static_js("manajemen_branch.js");
		$this->display("master/branch_management", $data);
	}

	public function ajax_detail_branch() {
		$this->load->model("master_branch", "branch");

		$branch_id = $this->input->post('branch_id');
		$profile_karyawan = $this->branch->with_city('fields:nama_kota')->get(array('branch_id'=>$branch_id));
		echo json_encode($profile_karyawan);
	}

	public function manage_branch() {
		$this->load->helper("form");
		$this->load->model("master_kota", "kota");
		$this->load->model("master_branch", "branch");

		$data["_title"] = "Tambah branch";

		$branch_id = $this->input->post('branch_id', TRUE);
		if (!empty($branch_id)) {
			$detail_branch = $this->branch->get(array('branch_id'=>$branch_id));
			if (!$detail_branch)
				redirect("master");
			$data['detail_branch'] = $detail_branch;
		}
		
		if ($this->input->post('save_branch')) {
			$branch_name = $this->input->post('branch_name', TRUE);
			$branch_address = $this->input->post('branch_address', TRUE);
			$id_kota = $this->input->post('city', TRUE);
			$branch_telp = $this->input->post('branch_telp', TRUE);

			$data_branch = array(
					'branch_name' => $branch_name,
					'branch_address' => $branch_address,
					'id_kota' => $id_kota,
					'branch_telp' => $branch_telp
				);
			if(isset($branch_id)) {
				$inserted = $this->branch->where('branch_id',$branch_id)->update($data_branch);
				$data['detail_branch'] = array_merge($detail_branch, $data_branch);
			} else {
				$inserted = $this->branch->insert($data_branch);
			}

			if ($inserted) {
				$data["notif"] = array('type'=>'success','message'=>'Data berhasil disimpan');
			} else {
				$data["notif"] = array('type'=>'error', 'message'=>'Data gagal disimpan');
			}
		}
		$list_kota = $this->kota->as_dropdown('nama_kota')->get_all(array('is_active'=>1));
		$data["list_kota"] = array_merge(array('0'=>'-- Kota --'), $list_kota);
		$this->display("master/manage-branch", $data);
	}

	public function list_account() {
		$this->load->model("account_model", "account");
		$this->load->model("master_branch", "branch");
		$this->load->model("auth_role", "roles");

		$data["_title"] = "Manajemen Akun";
		$data["accounts"] = $this->account->with_profile("fields:first_name,last_name")->with_branch("fields:branch_name")
							->with_account_role()->with_auth_role()->get_all();
		$data["branches"] = $this->branch->as_dropdown('branch_name')->get_all();
		$data["roles"] = $this->roles->as_dropdown('role_name')->get_all();
		// cetak($data["accounts"]);die();
		$this->add_datatable();
		$this->add_static_js("manajemen_account.js");
		$this->display("master/account_management", $data);
	}

	public function manage_account() {
		$this->load->helper("form");
		$this->load->model("auth_role", "roles");
		$this->load->model("master_branch", "branch");

		$data["_title"] = "Tambah account";
		$data["roles"] = $this->roles->as_dropdown('role_name')->get_all();
		$data["branches"] = $this->branch->as_dropdown('branch_name')->get_all();
		$this->display("master/manage-account", $data);
	}

	public function inactivate_account($account_id) {
		echo "Under Construction";
	}
}
