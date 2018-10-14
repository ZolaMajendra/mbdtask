<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends MY_Controller {

	public function index() {
		redirect("keuangan/harian");
	}

	public function harian() {
		$data["_title"] = "Pendapatan Harian";
		$this->add_static_css("dashboard.css");
		$this->display("keuangan/lap_harian", $data);
	}

	public function kasKecil() {
		$this->load->helper('form');
		$data["_title"] = "Kas Kecil";
		$msg = $this->session->flashdata('res');

		$data['deskripsi'] = array('0'						=> '-- Pilih Deskripsi --',
							'Kebutuhan Operasional Kantor'	=> 'Kebutuhan Operasional Kantor',
							'Kebutuhan Bulanan' 			=> 'Kebutuhan Bulanan',
							'Kebutuhan Marketing' 			=> 'Kebutuhan Marketing',
							'Kebutuhan Insidental' 			=> 'Kebutuhan Insidental',
							'Lain-lain' 					=> 'Lain-lain');

		if($msg){
			$data['notif'] = array('type' => 'success', 'message' => 'Data berhasil dimasukkan');
		}

		if(!$msg && !empty($msg)){
			$data['notif'] = array('type' => 'error', 'message' => 'Data gagal dimasukkan');
		}

		$this->add_static_css("dashboard.css");
		$this->add_js("jquery.priceformat.js");
		$this->add_js("jquery.priceformat.min.js");
		$this->display("keuangan/kas_kecil", $data);
	}

	public function kasBesar(){
		$data["_title"] = "Kas Besar";
		$msg = $this->session->flashdata('res');

		if($msg){
			$data['notif'] = array('type' => 'success', 'message' => 'Data berhasil dimasukkan');
		}
		
		if(!$msg && !empty($msg)){
			$data['notif'] = array('type' => 'error', 'message' => 'Data gagal dimasukkan');
		}

		if($msg ==2){
			$data['notif'] = array('type' => 'error', 'message' => 'Data Kas Besar pada Tanggal tsb Sudah Pernah Dimasukkan!!!');
		}
		
		$this->add_static_css("dashboard.css");
		$this->add_js("jquery.priceformat.js");
		$this->add_js("jquery.priceformat.min.js");
		$this->display("keuangan/kas_besar", $data);
	}

	public function pemasukan_pusat(){
		$data["_title"] = "Pemasukan dari Pusat";
		$msg = $this->session->flashdata('res');
		
		if($msg){
			$data['notif'] = array('type' => 'success', 'message' => 'Data berhasil dimasukkan');
		}
		if(!$msg && !empty($msg)){
			$data['notif'] = array('type' => 'error', 'message' => 'Data gagal dimasukkan');
		}		
		
		$this->add_static_css("dashboard.css");
		$this->add_js("jquery.priceformat.js");
		$this->add_js("jquery.priceformat.min.js");
		$this->display("keuangan/pemasukan_pusat", $data);
	}

	public function addKasKecil (){
		$this->load->model('Kaskecil_model', 'kasKecil');
		$data["_title"] = "Kas Kecil";
		$harga = preg_replace("/[^0-9]/", '', $this->input->post('harga'));
		$total = $this->input->post('jml') * $harga;

		$tgl = date('Y-m-d', strtotime($this->input->post('tgl')));
		$data_kas_kecil = $this->kasKecil->where(array("tgl_kk="=>$tgl))->get_all();
		
		/*Jika data kas kecil pada tgl itu masih kosong, maka ambil saldo terakhir untuk dimasukkan ke kas kecil*/
		if(empty($data_kas_kecil)){
			$tgl_saldo_awal 	= $this->kasKecil->fields("tgl_kk")->order_by("tgl_kk", 'desc')->get();
			$tgl_saldo_awal 	= $tgl_saldo_awal['tgl_kk'];
			$data_saldo_awal 	= $this->get_saldo_awal($tgl_saldo_awal);
			$saldo_awal 		= $data_saldo_awal[sizeof($data_saldo_awal)-1]['saldo_rp'];

			if($data_saldo_awal){
				$input_saldo_awal = array('tgl_kk'	=> date('Y-m-d', strtotime($this->input->post('tgl'))),
						'no_item'		=> '',
						'uraian_item' 	=> 'Saldo Awal',
						'jumlah_item'	=> '',
						'harga_satuan'	=> '',
						'debit_kk'		=> $saldo_awal,
						'kredit_kk'		=> '',
						'created_by' 	=> $this->session->userdata('account_username')
						);
				$this->kasKecil->insert($input_saldo_awal);
			}
		}

		$input = array('tgl_kk'	=> date('Y-m-d', strtotime($this->input->post('tgl'))),
						'no_item'		=> $this->input->post('noitem'),
						'uraian_item' 	=> empty($this->input->post('deskripsilain')) ? $this->input->post('deskripsi') : $this->input->post('deskripsilain'),
						'jumlah_item'	=> $this->input->post('jml'),
						'harga_satuan'	=> $harga,
						'debit_kk'		=> ($this->input->post('kategori') == 'debit' ) ? $total : 0,
						'kredit_kk'		=> ($this->input->post('kategori') == 'kredit' ) ? $total : 0,
						'created_by' 	=> $this->session->userdata('account_username')
						);
		
		if(!$this->kasKecil->insert($input))
		{
			$this->session->set_flashdata('res', 0);
			redirect('keuangan/kasKecil');
		}
		else
		{
			$this->session->set_flashdata('res', 1);
			redirect('keuangan/kasKecil');
		}
	}

	public function lapHarian(){
		$tgl = date('Y-m-d', strtotime($this->input->post('tgl')));
		
		$this->load->model('Pembayaran_model', 'pembayaran');
		$data = $this->pembayaran->get_lap_harian($tgl);		
		$total = $totalrp = 0;
		
		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['tgl_pembayaran'] 	= date('d-m-Y', strtotime($value['tgl_pembayaran']));
				$data[$key]['pendapatanrp'] 	= number_format($value["pendapatan"],2,",",".");
				$total 							= $total + $data[$key]['pendapatan'];
				$totalrp 						= number_format($total,2,",",".");				
				$data[$key]['total'] 			= $total;
				$data[$key]['totalrp'] 			= $totalrp;
			}
		}
		
		if($this->input->post('btn_cetak')){
			$print["_title"] 	= "Laporan Pendapatan Harian";
			$print['dataprint'] = $data;
			$print['tgl'] 		= $this->input->post('tgl');
			$this->display('keuangan/cetak_lap_harian', $print);
		}
		else{
			echo json_encode($data);
		}
		
	}

	public function rekap_kas_kecil() {
		$data["_title"] = "Rekap Kas Kecil";
		$this->add_static_css("dashboard.css");
		$this->display("keuangan/rekap_kas_kecil", $data);
	}

	public function get_saldo_awal($tgl){
		$this->load->model('Kaskecil_model', 'kas_kecil');

		$data = $this->kas_kecil->where(array("tgl_kk="=>$tgl))->get_all();
		$tot_deb = $tot_kre = 0;

		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['tgl_kk'] 			= date('d-m-Y', strtotime($data[$key]['tgl_kk']));
				$data[$key]['debit_rp'] 		= !empty($data[$key]['debit_kk']) ? number_format($data[$key]['debit_kk'],2,",",".") : "-";
				$data[$key]['kredit_rp'] 		= !empty($data[$key]['kredit_kk']) ? number_format($data[$key]['kredit_kk'],2,",",".") : "-";
				$data[$key]['harga_satuan_rp'] 	= !empty($data[$key]['harga_satuan']) ? number_format($data[$key]['harga_satuan'],2,",",".") : '-';
				$data[$key]['jumlah_item'] 		= !empty($data[$key]['jumlah_item']) ? $data[$key]['jumlah_item'] : '-';
				
				$tot_deb += $data[$key]['debit_kk'];
				$tot_kre += $data[$key]['kredit_kk'];
			}
		
			$saldo 		= $tot_deb - $tot_kre;
			$last_idx 	= sizeof($data);
			$data[$last_idx]['tot_deb_rp'] 	= $tot_deb;
			$data[$last_idx]['tot_kre_rp'] 	= $tot_kre;
			$data[$last_idx]['saldo_rp'] 	= $saldo;
		}		
		
		return $data;
	}

	public function get_kas_kecil(){
		$this->load->model('Kaskecil_model', 'kas_kecil');
		$tgl = '';
		$ajax = $this->input->post('ajax');

		if($this->input->post('tgl')){
			$tgl = date('Y-m-d', strtotime($this->input->post('tgl')));
		}
				
		$data = $this->kas_kecil->where(array("tgl_kk="=>$tgl))->get_all();
		$tot_deb = $tot_kre = 0;

		if($data){
			foreach ($data as $key => $value) {
				$data[$key]['tgl_kk'] 			= date('d-m-Y', strtotime($data[$key]['tgl_kk']));
				$data[$key]['debit_rp'] 		= !empty($data[$key]['debit_kk']) ? number_format($data[$key]['debit_kk'],2,",",".") : "-";
				$data[$key]['kredit_rp'] 		= !empty($data[$key]['kredit_kk']) ? number_format($data[$key]['kredit_kk'],2,",",".") : "-";
				$data[$key]['harga_satuan_rp'] 	= !empty($data[$key]['harga_satuan']) ? number_format($data[$key]['harga_satuan'],2,",",".") : '-';
				$data[$key]['jumlah_item'] 		= !empty($data[$key]['jumlah_item']) ? $data[$key]['jumlah_item'] : '-';
				
				$tot_deb += $data[$key]['debit_kk'];
				$tot_kre += $data[$key]['kredit_kk'];
			}
		
			$saldo 		= $tot_deb - $tot_kre;
			$last_idx 	= sizeof($data);
			$data[$last_idx]['tot_deb_rp'] 	= number_format($tot_deb, 2, ",", ".");
			$data[$last_idx]['tot_kre_rp'] 	= number_format($tot_kre, 2, ",", ".");
			$data[$last_idx]['saldo_rp'] 	= number_format($saldo, 2, ",", ".");
		}		
		
		if($this->input->post('btn_cetak')){
			$print['_title'] 	= 'Kas Kecil';
			$print['dataprint'] = $data;
			$this->display('keuangan/cetak_kas_kecil', $print);
		}else{
			echo json_encode($data);
		}
		
	}

	public function add_pusat_inc(){
		$this->load->model('Pemasukan_pusat', 'pemasukan_pusat');
		
		if(!($this->input->post('tgl')) || !($this->input->post('jumlah'))){
			$data['notif'] = array('type' => 'error', 'message' => 'Tanggal atau Jumlah uang tidak boleh kosong!!!');
		}
		else{
			$input = array('tgl_pemasukan'		=> date('Y-m-d', strtotime($this->input->post('tgl'))),
							'jumlah_pemasukan' 	=> $this->input->post('jumlah'),
							'created_by'		=> $this->session->userdata('account_username')
							);

			if($this->pemasukan_pusat->insert($input)){				
				$this->session->set_flashdata('res', 1);
				redirect('keuangan/pemasukan_pusat');
			}else{
				$this->session->set_flashdata('res', 0);
				redirect('keuangan/pemasukan_pusat');
			}
		}		
	}

	public function add_kas_besar(){
		$this->load->model('Kasbesar_model', 'kasbesar');
		$tgl = date('Y-m-d', strtotime($this->input->post('tgl')));
		$data_kas_besar = $this->kasbesar->get_kas_besar($tgl);

		/*untuk pengecekan apakah sudah ada data kas besar di tgl itu, menggunakan flash nilainya 2*/
		if($data_kas_besar){
			$this->session->set_flashdata('res', 2);
			redirect('keuangan/kasBesar');
			exit();
		}

		$input = array(	'tgl_kb'			=> date('Y-m-d', strtotime($this->input->post('tgl'))),
						'pemasukan_bimbel'	=> preg_replace("/[^0-9]/", '', $this->input->post('uangbimbel')),
						'pemasukan_pusat'	=> preg_replace("/[^0-9]/", '', $this->input->post('uangpusat')),
						'pengeluaran'		=> str_replace(".", '', $this->input->post('pengeluaran')),
						'pengisian'			=> preg_replace("/[^0-9]/", '', $this->input->post('pengisian')),
						'setor'				=> preg_replace("/[^0-9]/", '', $this->input->post('setor')),
						'setor_kepada'		=> $this->input->post('setorkpd'),
						'created_by'		=> $this->session->userdata('account_username')
					);

		if($this->kasbesar->insert($input)){				
			$this->session->set_flashdata('res', 1);
			redirect('keuangan/kasBesar');
		}else{				
			$this->session->set_flashdata('res', 0);
			redirect('keuangan/kasBesar');
		}

	}

	public function rekap_kas_besar() {
		$data["_title"] = "Rekap Kas Besar";
		$this->add_static_css("dashboard.css");
		$this->display("keuangan/rekap_kas_besar", $data);
	}

	public function get_kas_besar(){
		$tgl = date('Y-m-d', strtotime($this->input->post('tgl')));
		$this->load->model('Kasbesar_model', 'kas_besar');
		$data = $this->kas_besar->get_kas_besar($tgl);				

		if($data){			
			$data['tgl_kb'] 		= date('d-m-Y', strtotime($data['tgl_kb']));
			$data['p_bimbel_rp'] 	= number_format($data['p_bimbel'],2,",",".");
			$data['p_pusat_rp'] 	= number_format($data['p_pusat'],2,",",".");
			$data['pengeluaran_rp'] = number_format($data['pengeluaran'],2,",",".");
			$data['pengisian_rp'] 	= number_format($data['pengisian'],2,",",".");
			$data['setor_rp'] 		= number_format($data['setor'],2,",",".");
		}

		if($this->input->post('btn_cetak')){
			$print['_title'] 	= 'Kas Besar';
			$print['dataprint'] = $data;
			$print['tgl'] 		= $this->input->post('tgl');
			$this->display('keuangan/cetak_kas_besar', $print);
		}else{
			echo json_encode($data);
		}
		
	}
}
