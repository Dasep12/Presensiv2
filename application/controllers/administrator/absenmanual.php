<?php

 /**
 * 
 */
 class Absenmanual extends CI_Controller
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

 		$this->form_validation->set_rules('tanggal','tanggal','required',[
 			'required'	=> 'data tanggal harus di isi '
 		]);
 		$this->form_validation->set_rules('tanggal','tanggal','required',[
 			'required'	=> 'data tanggal harus di isi '
 		]);
 		$this->form_validation->set_rules('status','status','required',[
 			'required'	=> 'data status harus di isi '
 		]);
 		$this->form_validation->set_rules('keterangan','keterangan','required',[
 			'required'	=> 'data keterangan harus di isi '
 		]);

 			if ($this->form_validation->run() == FALSE) {
		 		$data['mahasiswa']	= $this->admin_presensi->getabsensi();
		 		$this->template->load('template/template','administrator/absenmanual',$data);
 			}else{
 				$nim = $this->input->post('nim');
 				$where = array('nim' => $nim);
 				$data = array(
 					'tanggal'		=> $this->input->post('tanggal'),
 					'keterangan'	=> $this->input->post('keterangan'),
 					'status'		=> $this->input->post('status'),
 					'masuk'			=> '-',
 					'pulang'		=> '-'
 				);

 				$this->admin_presensi->manualabsen('absensi',$data,$where);
 				$this->session->set_flashdata('pesan','berhasil');
 				redirect('administrator/absenmanual');

 			}


 	}

 }