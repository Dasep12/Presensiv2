<?php
 /**
 * 
 */

 class Dashboard extends CI_Controller
 {


 	
 	public function __construct()
 	{
 		parent::__construct();
 			if(empty($this->session->userdata('role_id'))){
 				$this->session->set_flashdata('pesan','<div class="alert alert-info"><center>Anda Harus Login Dulu</center></div>');
 				redirect('administrator/login/');
 			}
 	}


 	public function index()
 	{

 	 	date_default_timezone_set('Asia/Jakarta');

 	 	//jumlah seluruh mahasiswa
 		$data['count_mhs'] 	=  $this->admin_presensi->countmhs(); 
 		
 		//jumlah mahasiswa Sistem Informasi
 		$data['count_si'] 	=  $this->admin_presensi->countsi();

 		//jumlah mahasiswa Teknik Informatika 
 		$data['count_ti'] 	=  $this->admin_presensi->countti(); 

 		//menampilkan siswa yang absensi di hari ini
 		$tgl = date('Y-m-d');
 		$data['mahasiswa']	=  $this->admin_presensi->trackingabsen($tgl);
 		$data['total'] = 0;
 		
 		$this->template->load('template/template' , 'administrator/dashboard' , $data);
 	}

 	public function search()
 	{
 		$data['count_mhs'] 	=  $this->admin_presensi->countmhs(); 
 		$data['count_si'] 	=  $this->admin_presensi->countsi(); 
 		$data['count_ti'] 	=  $this->admin_presensi->countti();



 		$keyword = $this->input->post('keyword');

 		if(empty($keyword)){
 			$this->session->set_flashdata('pesan','Data kosong');
 			redirect('administrator/dashboard/index');
 		}elseif(!empty($keyword)){
 				 	$data['mahasiswa']  = $this->admin_presensi->cari($keyword);
 			 		$data['total']  = $this->admin_presensi->cari($keyword);
					$this->template->load('template/template' , 'administrator/dashboard' , $data);
 			 	}
 		

 	}

 }