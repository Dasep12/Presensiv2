<?php


 /**
 * 
 */
 class Edit_mhs extends CI_Controller
 {
 	
 	public function __construct()
 	{
 		parent::__construct();
 			if(empty($this->session->userdata('role_id'))){
 				$this->session->set_flashdata('pesan','<div class="alert alert-info"><center>Anda Harus Login Dulu</center></div>');
 				redirect('administrator/login/');
 			}
 	}


 	public function index($where)
 	{
 		$data['mahasiswa']	= $this->admin_presensi->ceknik($where);
 		$this->template->load('template/template','administrator/editmhs',$data);
 	}


 }