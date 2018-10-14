<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller {


	public function pendaftaran() {
		$this->load->helper('form');
		$this->load->model("kelas_model", "kelas");
		$data["_title"] = "Pendaftaran Siswa";
		$msg = $this->session->flashdata('res');
		$data["kelas"] = array(	"0" => "--Pilih Kelas--");
		
		$data["jenjang"] = array("0" => "--Pilih Jenjang--",
								"SD" => "SD",
								"SMP" => "SMP",
								"SMA" => "SMA",
								"SMK" => "SMK");

		$data["agama"] = array("0" => "--Pilih Agama--", 
								"Islam" => "Islam", 
								"Kristen" => "Kristen", 
								"Katholik" => "Katholik", 
								"Hindu" => "Hindu", 
								"Budha" => "Budha", 
								"Kong Hu Chu" => "Kong Hu Chu");

		$init_kelas_uniq = array("--Pilih Kelas Uniq--");
		$res_kelas_uniq = $this->kelas->as_dropdown('nama_kelas')->get_all();
		$data["kelas_uniq"] = array_merge($init_kelas_uniq, $res_kelas_uniq);

		if($msg){
			$data['notif'] = array('type' => 'success', 'message' => 'Data berhasil dimasukkan');
		}
		if(!$msg && !empty($msg)){
			$data['notif'] = array('type' => 'error', 'message' => 'Data gagal dimasukkan');
		}
		
		$this->add_static_css("dashboard.css");
		$this->add_js("jquery.priceformat.js");
		$this->add_js("jquery.priceformat.min.js");
		$this->display("siswa/form_pendaftaran", $data);
	}

	public function pembayaran() {
		$this->load->helper('form');
		$this->load->model("kelas_model", "kelas");
		$data["_title"] = "Pembayaran Siswa";
		$data['message'] = $this->session->flashdata('res');
		$data["kelas"] = $this->kelas->as_dropdown('nama_kelas')->get_all();
		$data["kelas"] = array_merge($data["kelas"], array("lainnya" => "Lainnya"));
		$data["kelas"] = array_merge(array("0" => "Pilih Kelas Uniq"), $data["kelas"]);
		
		$data['jenis_bayar'] = array("0" => "--Silahkan Pilih--", "cicilan 1" => "Cicilan 1",
									"cicilan 2" => "Cicilan 2", "cicilan 3" => "Cicilan 3",
									"cicilan 4" => "Cicilan 4", "cicilan 5" => "Cicilan 5",
									"cicilan 6" => "Cicilan 6", "cicilan 7" => "Cicilan 7",
									"cicilan 8" => "Cicilan 8", "lainnya" 	=> "Lainnya");
		
		$this->add_static_css("dashboard.css");
		$this->add_js("jquery.priceformat.js");
		$this->add_js("jquery.priceformat.min.js");

		if($data['message']){
			$data['notif'] = array('type' => 'success', 'message' => 'Data berhasil dimasukkan');
		}
		
		if(!$data['message'] && !empty($data['message'])){
			$data['notif'] = array('type' => 'error', 'message' => 'Data gagal dimasukkan');
		}
		
		$this->display("siswa/form_pembayaran", $data);
	}

	public function tambahSiswa(){
		$this->load->model('siswa_model', 'siswa');
		$this->load->model('pembayaran_model', 'pembayaran');
		$data["_title"] = "Pendaftaran Siswa";

		$input = array('id_kelas' 		 => $this->input->post('kelas_uniq'),
						'nama'			 => $this->input->post('nama'),
						'panggilan' 	 => $this->input->post('namapgl'),						
						'agama'			 => $this->input->post('agama'),
						'kelas'			 => $this->input->post('kelas'),
						'telepon'		 => $this->input->post('telepon'),
						'sekolah'		 => $this->input->post('sekolah'),
						'alamat'		 => $this->input->post('alamat'),
						'tempat_lahir' 	 => $this->input->post('tempat'),
						'tgl_lahir'		 => date('Y-m-d', strtotime($this->input->post('tgllahir'))),
						'ayah_siswa' 	 => $this->input->post('ayah'),
						'ibu_siswa'		 => $this->input->post('ibu'),
						'telp_ayah'		 => $this->input->post('tlpayah'),
						'telp_ibu'		 => $this->input->post('tlpibu'),
						'pekerjaan_ayah' => $this->input->post('jobayah'),
						'pekerjaan_ibu'	 => $this->input->post('jobibu'),
						'created_by' 	 => $this->session->userdata('account_username')
						);

		if(!$this->siswa->insert($input)){
			$this->session->set_flashdata('res', 0);
			redirect('siswa/pendaftaran');
		}
		else{
			$idSiswa = $this->db->insert_id();
			$idKota = $this->session->userdata("kota_id");
			$idBranch = $this->session->userdata("branch_id");

			$nia = $idKota.'-'.$idBranch.'-'.$input['kelas'].'-'.$input['id_kelas'].'-'.$idSiswa;
			$data_nia = array('nia'=>$nia);
			$this->siswa->where('id_siswa', $idSiswa)->update($data_nia);
			
			$biaya = array('id_siswa' 		=> $idSiswa,
							'biaya_daftar'	=> str_replace(".", '', $this->input->post('biaya_daftar')),
							'biaya_bimbel'	=> str_replace(".", '', $this->input->post('biaya_bimbel')),
							'created_by' 	=> $this->session->userdata('account_username')
						);

			$this->pembayaran->insert($biaya);
			$this->session->set_flashdata('res', 1);
			redirect('siswa/pendaftaran');
		}
	}

	public function listSiswa() {
		$this->load->model('siswa_model', 'siswa');
		$data["_title"] = "List Siswa";
		$data['siswa'] = $this->siswa->with_kelas("fields:nama_kelas")->get_all();
		$this->add_datatable();
		$this->add_static_js("account_management.js");
		$flash = $this->session->flashdata('res');

		if(!empty($flash)){
				$data['message'] = $flash;
		}
		
		$this->display("siswa/list_siswa", $data);
	}

	public function tambahPembayaran(){
		$this->load->model('pembayaran_model', 'pembayaran');
		$data["_title"] = "Pembayaran Siswa";
		$hist = $this->pembayaran->where('id_siswa', $this->input->post('idsiswa'))->order_by('id_pembayaran', 'DESC')->get();

		$input = array('id_siswa' 			=> $this->input->post('idsiswa'),
						'no_kwitansi'		=> $this->input->post('kwitansi'),
						'biaya_bimbel'		=> $hist['biaya_bimbel'] - str_replace(".", '', $this->input->post('nominal')),
						'jumlah'			=> str_replace(".", '', $this->input->post('nominal')),
						'jenis' 			=> empty($this->input->post('pembayaranlain')) ? $this->input->post('jenis') : $this->input->post('pembayaranlain'),
						'tgl_pembayaran'	=> date('Y-m-d', strtotime($this->input->post('tgl'))),
						'created_by' 		=> $this->session->userdata('account_username')
						);	
		
		if(!$this->pembayaran->insert($input)){			
			$this->session->set_flashdata('res', 0);
		}
		else{			
			$this->session->set_flashdata('res', 1);
		}
		redirect('siswa/pembayaran');
	}

	public function cetak_kwitansi($id_pembayaran){
		$this->load->model('pembayaran_model', 'pembayaran');
		$data["_title"] = "Kwitansi Pembayaran Siswa";
		$data['pembayaran'] = $this->pembayaran->with_siswa('fields:nama')->where('id_pembayaran', $id_pembayaran)->get();
		$this->display('siswa/kwitansi_bayar', $data);
	}

	public function cetakDataSiswa($id_siswa){
		$this->load->model('siswa_model', 'siswa');
		$data["_title"] = "Data Siswa";
		$data['siswa'] = $this->siswa->where('id_siswa', $id_siswa)->get();
		$this->display('siswa/cetak_data_siswa', $data);
	}

	public function historiPembayaran(){
		$this->load->model('pembayaran_model', 'pembayaran');
		$data['_title'] = 'Histori Pembayaran Siswa';
		$data['pembayaran'] = $this->pembayaran->with_siswa('fields:id_siswa, nama')->get_all();
		$this->add_datatable();
		$this->add_static_css("dashboard.css");
		$this->display("siswa/list_pembayaran", $data);
	}

	public function allSiswa(){
		$this->load->model('siswa_model', 'siswa');
		$kode = $this->input->post('kode');
		$hsl = $this->siswa->where('nama LIKE', '%'.$kode.'%')->get_all();
		$data = array();
		foreach ($hsl as $key => $value) {
			$res['value'] = $value['nama'];
			$res['id'] = $value['id_siswa'];
			$res['id_kelas'] = $value['id_kelas'];
			$data[] = $res;
		}
		echo json_encode($data);
	}

	public function getDetailSiswa(){
		$this->load->model('siswa_model', 'siswa');
		$idSiswa = $this->input->post('id_siswa');
		$res = $this->siswa->where_id_siswa($idSiswa)->get();
		echo json_encode($res);
	}

	public function index() {
		redirect("siswa/pendaftaran");
	}

	public function editSiswa($idSiswa){
		$this->load->helper("form");
		$this->load->model('siswa_model', 'siswa');
		$this->load->model('kelas_model', 'kelas');
		$data["_title"] = "Edit Data Siswa";
		$flash = $this->session->flashdata('res');

		$data["dd_kelas"] = array("0" => "--Pilih Kelas--");
		$data["jenjang"] = array("0" => "--Pilih Jenjang--");

		$init_kelas_uniq = array("--Pilih Kelas Uniq--");
		$res_kelas_uniq = $this->kelas->as_dropdown('nama_kelas')->get_all();
		$data["dd_kelas_uniq"] = array_merge($init_kelas_uniq, $res_kelas_uniq);

		if(!empty($flash)){
			$data['message'] = $flash;
		}

		$data['datas'] = $this->siswa->where_id_siswa($idSiswa)->get();	
		$this->display("siswa/edit_siswa", $data);
	}

	public function updateSiswa(){
		$this->load->model('siswa_model', 'siswa');
		$data["_title"] = "Edit Data Siswa";

		$input = array('id_kelas' 		 => $this->input->post('kelas_uniq'),
						'nama'			 => $this->input->post('nama'),
						'panggilan' 	 => $this->input->post('namapgl'),
						'agama'			 => $this->input->post('agama'),
						'kelas'			 => $this->input->post('kelas'),
						'telepon'		 => $this->input->post('telepon'),
						'sekolah'		 => $this->input->post('sekolah'),
						'alamat'		 => $this->input->post('alamat'),
						'tempat_lahir' 	 => $this->input->post('tempat'),
						'tgl_lahir'		 => date('Y-m-d', strtotime($this->input->post('tgllahir'))),
						'ayah_siswa' 	 => $this->input->post('ayah'),
						'ibu_siswa'		 => $this->input->post('ibu'),
						'telp_ayah'		 => $this->input->post('tlpayah'),
						'telp_ibu'		 => $this->input->post('tlpibu'),
						'pekerjaan_ayah' => $this->input->post('jobayah'),
						'pekerjaan_ibu'	 => $this->input->post('jobibu'),
						'updated_by' 	 => $this->session->userdata('account_username')
						);

		if($this->siswa->where('id_siswa', $this->input->post('idsiswa'))->update($input)){
			$this->session->set_flashdata('res', 1);
			redirect('siswa/editSiswa/'.$this->input->post('idsiswa'));
		}
		else{
			$this->session->set_flashdata('res', 0);
			redirect('siswa/editSiswa/'.$this->input->post('idsiswa'));
		}

	}

	public function hapusSiswa(){
		$idSiswa = $this->input->get('id');
		$this->load->model('siswa_model', 'siswa');

		if($this->siswa->delete($idSiswa)){
			$this->siswa->where('id_siswa', $idSiswa)->update(array("deleted_by" => $this->session->userdata('account_username')));
			$this->session->set_flashdata('res', 1);
			redirect('siswa/listSiswa/');
		}
		else{
			$this->session->set_flashdata('res', 0);
			redirect('siswa/listSiswa/');
		}
	}

	public function cetak_pembayaran_siswa($id_siswa){
		$this->load->model('siswa_model', 'siswa');
		$this->load->model('pembayaran_model', 'pembayaran');
		$data["_title"] = "Cetak Histori Pembayaran Siswa";

		$data['pembayaran'] = $this->pembayaran->where('id_siswa', $id_siswa)->with_siswa('fields:id_siswa, nama')->order_by('tgl_pembayaran', 'asc')->get_all();
		$this->display("siswa/cetak_pembayaran_siswa", $data);
	}
}
