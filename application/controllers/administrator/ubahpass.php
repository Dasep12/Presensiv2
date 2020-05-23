<?php

 /**
 * 
 */
 class Ubahpass extends CI_Controller
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
 		$this->template->load('template/template','administrator/ubahpass');
 	}

 	public function update()
 	{
 		$this->form_validation->set_rules('pass','pass','required|matches[pass2]',[
 			'required'		=> 'password tidak boleh kosong',
 			'matches'		=> 'password harus sama'
 		]);
 		$this->form_validation->set_rules('pass2','pass2','required',[
 			'required'		=> 'password harus di tulis ulang'
 		]);
 			if($this->form_validation->run() == FALSE){
 				$this->index();
 			}else{

 				$where =  array('id'		=> $this->input->post('id'));
 				$data  =  array('pass'		=> $this->input->post('pass'));

 				$this->admin_presensi->editpass($data,'admin',$where);
 				$this->session->set_flashdata('alert','Berhasil');
 				redirect('administrator/ubahpass/index');
 			}
 	}
 }