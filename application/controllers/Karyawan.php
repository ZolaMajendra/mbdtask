<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends MY_Controller {

	public function index() {
		redirect("karyawan/account_management");
	}

	public function account_management() {
		$this->load->model("karyawan_profile", "karyawan");

		$data["_title"] = "Daftar Akun Karyawan";
		$role = $this->session->userdata("account_role");
		if($role == 2) {
			$data["karyawan_account"] = $this->karyawan->with_account('fields:account_username,account_email,is_active')->with_appointment('fields:appointment_name')->get_all();
		} else {
			$branch_id = $this->session->userdata("branch_id");
			$data["karyawan_account"] = $this->karyawan->with_account('fields:account_username,account_email,is_active')->with_appointment('fields:appointment_name')->where(array('branch_id'=>$branch_id))->get_all();
		}
		
		$this->add_datatable();
		$this->add_static_js("account_management.js");
		$this->display("karyawan/account_management", $data);
	}

	public function manage_account() {
		$this->load->helper("form");
		$this->load->model(array("master_branch", "master_appointment"));
		$this->load->model("karyawan_profile", "karyawan");

		$data["_title"] = "Manajemen Akun Karyawan";

		$account_id = $this->input->post('account_id', TRUE);
		if(!empty($account_id)) {
			$detail_account = $this->karyawan->with_account('fields:account_username,account_email,is_active')->with_appointment('fields:appointment_name')->get(array('account_id'=>$account_id));
			if(!$detail_account)
				redirect('account_management');
			$data['detail_account'] = $detail_account;
		}
		$action 		= $this->input->post("save_karyawan");
		if ($action == "submit") {
			$fullname 		= $this->input->post("txtFullname");
			$name 			= explode(' ', $fullname);
			$firstname 		= $name[0];
			unset($name[0]); 
			$lastname 		= implode(' ', $name);
			$appointment 	= $this->input->post("txtAppointment");
			$phonenumber	= $this->input->post("phoneNumber");
			$address		= $this->input->post("txtAddress");
			$birthplace		= $this->input->post("txtBirthPlace");
			$date_obj		= DateTime::createFromFormat('d-m-Y', $this->input->post("txtBirthDate"));
			$birthdate		= $date_obj->format('Y-m-d');
			$laststudy		= $this->input->post("lastStudy");
			$college		= $this->input->post("institutionStudy");
			$bankname		= $this->input->post("bankName");
			$bankaccount	= $this->input->post("bankAccount");
			
			$branch 		= $this->input->post("txtBranch");
			$email			= $this->input->post("txtEmail");
			$username 		= $this->input->post("txtUsername");
			$password		= $this->input->post("txtPassword");

			$this->load->model(array("karyawan_account", "karyawan_profile", "auth_model"));
			$account_id = $this->karyawan_account->get_id();
			$data_account = array(
					'account_id'		=> $account_id,
					'branch_id'			=> $branch,
					'account_email'		=> $email,
					'account_username'	=> $username,
					'account_password'	=> $this->auth_model->encrypt_password($password, $username),
					'created_by'		=> $this->session->userdata('account_username'),
					'is_active' 		=> 1
				);
			$this->karyawan_account->insert($data_account);

			$data_profile = array(
					'branch_id' 		=> $branch,
					'account_id' 		=> $account_id,
					'appointment_id'	=> $appointment,
					'profile_firstname'	=> $firstname,
					'profile_lastname'	=> $lastname,
					'profile_address'	=> $address,
					'phone_number'		=> $phonenumber,
					'birthdate'			=> $birthdate,
					'birthplace'		=> $birthplace,
					'education'			=> $laststudy,
					'college'			=> $college,
					'bank_name'			=> $bankname,
					'bank_account'		=> $bankaccount
				);
			$inserted = $this->karyawan_profile->insert($data_profile);
			if ($inserted) {
				$data["notif"] = array('type'=>'success','message'=>'Data berhasil disimpan');
			} else {
				$data["notif"] = array('type'=>'error', 'message'=>'Data gagal disimpan');
			}
			
		}
		
		$data["list_branch"] = $this->master_branch->as_dropdown('branch_name')->get_all(array("is_active"=>1));
		$data["list_jabatan"] = $this->master_appointment->as_dropdown('appointment_name')->get_all(array("is_active"=>1));
		$this->add_static_js("account_management.js");
		$this->display("karyawan/add_account", $data);
	}

	public function ajax_detail_profile() {
		$this->load->model("karyawan_profile", "profile");
		$account_id = $this->input->post('account_id');
		$profile_karyawan = $this->profile->get(array('account_id'=>$account_id));
		echo json_encode($profile_karyawan);
	}

	public function inactivate_account() {

	}

	public function attendance() {
		$this->load->model("karyawan_profile", "karyawan");

		$data["_title"] = "Input Kehadiran karyawan";
		$role = $this->session->userdata("account_role");
		$branch_id = $this->session->userdata("branch_id");
		if($role == 2) {
			$data["karyawan_data"] = $this->karyawan->with_appointment('fields:appointment_name')->get_all();
		} else {
			$data["karyawan_data"] = $this->karyawan->with_appointment('fields:appointment_name')->get_all(array('branch_id'=>$branch_id));
		}
		$action = $this->input->post("save_attendance");
		$data['date_selected'] = ($this->input->post('date_attendance')) ? $this->input->post('date_attendance') : date('d-m-Y');
		if ($action == 'submit') {
			$this->load->model("karyawan_attendance", "attendance");
			$date_attendance_raw= DateTime::createFromFormat('d-m-Y', $data["date_selected"]);
			$date_attendance 	= $date_attendance_raw->format('Y-m-d');
			$get_attendance 	= $this->attendance->get(array('attendance_date'=>$date_attendance, 'branch_id'=>$branch_id));
			if ($get_attendance) {
				$data["notif"] = array('type'=>'error', 'message'=>'Absensi pada tanggal ini sudah diisi');
			} else {
				$karyawans			= $this->input->post("accounts");
				$attendance_notes	= $this->input->post("attendance_note");
				$karyawan_attendance = array();
				foreach ($karyawans as $key => $karyawan) {
					$karyawan_attendance[] = array(
							'branch_id'	=> $branch_id,
							'attendance_date' => $date_attendance, 
							'account_id'=> $karyawan,
							'attendance'=> $attendance_notes[$key],
						);
				}
				$inserted = $this->attendance->insert($karyawan_attendance);
				if ($inserted) {
					$data["notif"] = array('type'=>'success','message'=>'Data berhasil disimpan');
				} else {
					$data["notif"] = array('type'=>'error', 'message'=>'Data gagal disimpan');
				}
			}
			
		}

		$this->add_static_js("karyawan_attendance.js");
		$this->display("karyawan/attendance", $data);
	}

	public function list_attendance() {
		$this->load->model("karyawan_attendance", "attendance");

		$data["_title"] = "Rekap kehadiran karyawan";
		$role = $this->session->userdata("account_role");
		$branch_id = $this->session->userdata("branch_id");
		if($role == 2) {
			$data["karyawan_attendance"] = $this->attendance->with_profile('fields:profile_firstname,profile_lastname')->get_all();
		} else {
			$data["karyawan_attendance"] = $this->attendance->with_profile('fields:profile_firstname,profile_lastname')->get_all(array('branch_id'=>$branch_id));
		}
		$data["attendance_notes"] = array(1=>'Hadir', 2=>'Ijin', 3=>'Sakit', 4=>'Tanpa keterangan');
		$this->add_datatable();
		$this->add_static_js("karyawan_attendance.js");
		$this->display("karyawan/attendance_list", $data);
	}

	public function salary_management() {
		$this->load->model("salary_model", "salary");

		$data["_title"] = "Slip Gaji Karyawan";
		$role = $this->session->userdata("account_role");
		$branch_id = $this->session->userdata("branch_id");
		if($role == 2) {
			$data["karyawan_salary"] = $this->salary->with_profile('fields:profile_firstname,profile_lastname')->get_all();
		} else {
			$data["karyawan_salary"] = $this->salary->with_profile('fields:profile_firstname,profile_lastname')->get_all(array('branch_id'=>$branch_id));
		}
		$this->add_datatable();
		$this->add_static_js("karyawan_salary.js");
		$this->display("karyawan/list_salary", $data);
	}

	public function add_salary() {
		$this->load->model("karyawan_profile", "karyawan");
		$this->load->model("salary_model", "salary");

		$data["_title"] = "Input Gaji Pegawai";
		$branch_id = $this->session->userdata("branch_id");
		$action = $this->input->post("add_salary");
		if($action == 'submit') {
			$karyawan_id = $this->input->post("karyawan");
			$month = $this->input->post("txtBulan");
			$kontrak = (int)str_replace('.', '', $this->input->post("nilai_kontrak"));
			$mengajar = (int)str_replace('.', '', $this->input->post("mengajar"));
			$mengajar_luar = (int)str_replace('.', '', $this->input->post("mengajar_luar") );
			$piket = (int)str_replace('.', '', $this->input->post("piket") );
			$pembahasan = (int)str_replace('.', '', $this->input->post("pembahasan") );
			$pembahasan_luar = (int)str_replace('.', '', $this->input->post("pembahasan_luar") );
			$kelebihan_jam = (int)str_replace('.', '', $this->input->post("kelebihan_jam") );
			$tunjangan = (int)str_replace('.', '', $this->input->post("tunjangan") );
			$sisa_pinjaman = (int)str_replace('.', '', $this->input->post("sisa_pinjaman") );
			$tgl_pinjam_raw= DateTime::createFromFormat('d-m-Y', $this->input->post("tgl_pinjaman"));
			$tgl_pinjam 	= $date_attendance_raw->format('Y-m-d');
			$cicilan = (int)str_replace('.', '', $this->input->post("cicilan") );
			$pinalti = (int)str_replace('.', '', $this->input->post("pinalti") );
			$keterlambatan = (int)str_replace('.', '', $this->input->post("keterlambatan") );
			$data_salary = array(
					'branch_id' => $branch_id,
					'account_id' => $karyawan_id,
					'slip_month' => $month,
					'nilai_kontrak' => $kontrak,
					'mengajar' => $mengajar,
					'mengajar_luar' => $mengajar_luar,
					'piket' => $piket,
					'pembahasan' => $pembahasan,
					'pembahasan_luar' => $pembahasan_luar,
					'kelebihan_jam' => $kelebihan_jam,
					'pinjaman_before' => $sisa_pinjaman,
					'cicilan' => $cicilan,
					'pinjaman_after' => $sisa_pinjaman - $cicilan,
					'tgl_pinjam' => $tgl_pinjam,
					'pinalti' => $pinalti,
					'keterlambatan' => $keterlambatan,
					'created_by' => $this->session->userdata('account_id')
				);
			$inserted = $this->salary->insert($data_salary);
			if ($inserted) {
				$data["notif"] = array('type'=>'success','message'=>'Data berhasil disimpan');
			} else {
				$data["notif"] = array('type'=>'error', 'message'=>'Data gagal disimpan');
			}
		}

		$data["list_karyawan"] = $this->karyawan->get_all(array('branch_id'=>$branch_id));
		$this->add_js("jquery.priceformat.min.js");
		$this->add_static_js("karyawan_salary.js");
		$this->display("karyawan/add_salary", $data);
	}

	public function salary_print($slip_id) {
		$this->load->model("salary_model", "salary");

		if(!is_numeric($slip_id))
			redirect("karyawan/salary_management");

		$data["_title"] = "Print Slip Gaji";
		$data["salary_detail"] = $this->salary->getSalary($slip_id);
		// var_dump($data["salary_detail"]);die();
		$this->display('karyawan/slip-gaji-print', $data);
	}
}
