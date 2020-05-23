<?php

 /**
 * 
 */
 class Absenmhs extends CI_Controller
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
 		$data['mahasiswa']	= $this->admin_presensi->getmhs(); 			
 		$this->template->load('template/template','administrator/absensi',$data);
 	
 	}

 	public function report()
 	{
 		

			$data['tanggal1'] = $this->input->post('tanggal1');
			$data['tanggal2'] = $this->input->post('tanggal2');
			$data['nim']	  = $this->input->post('nim');
				if (empty($data['tanggal1']) && empty($data['tanggal2'])) {
					$tgl1 = '';
					$tgl2 = '';
					$nim  = '';
					$data['absensi'] = $this->admin_presensi->reportabsen($tgl1 , $tgl2 , $nim)->result();
				}else{
					$nim  = $this->input->post('nim');
					$tgl1 = $data['tanggal1'];
					$tgl2 = $data['tanggal2']; 
					$data['absensi'] = $this->admin_presensi->reportabsen($tgl1 , $tgl2 , $nim)->result();
				}

 		$data['mahasiswa']	= $this->admin_presensi->getmhs(); 			
 		$this->template->load('template/template','administrator/absensi',$data);
 		
 	}
 }