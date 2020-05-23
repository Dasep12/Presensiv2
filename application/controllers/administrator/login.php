<?php

 /**
 * 
 */
 class Login extends CI_Controller
 {
 	
public function __construct()
 	{
 		parent::__construct();
 			if(!empty($this->session->userdata('role_id'))){
 				$this->session->set_flashdata('pesan','<div class="alert alert-info"><center>Anda Harus Login Dulu</center></div>');
 				redirect('administrator/dashboard/');
 			}
 	}

 	public function index()
 	{

 		$this->load->view('administrator/login');

 	}

 	public function ceklogin()
 	{
 		$this->form_validation->set_rules('nama','nama','required',[
 			'required'		=> 'nama harus di isi'
 		]);
 		 $this->form_validation->set_rules('pass','pass','required',[
 			'required'		=> 'password harus di isi'
 		]);
 		 	if ($this->form_validation->run() == FALSE) {
 		 		$this->index();
 		 	}else{
 		 		$auth = $this->m_auth->getdata(); 

 		 		if($auth == FALSE){
 		 			$this->session->set_flashdata('alert','gagal');
           			redirect('administrator/login');
 		 		}else{

 		 		$this->session->set_userdata('nama', $auth->nama);
 		 		$this->session->set_userdata('id', $auth->id);
 		 		$this->session->set_userdata('pass' , $auth->role_id);
 		 		$this->session->set_userdata('role_id' , $auth->role_id);
 		 		$this->session->set_userdata('poto' , $auth->poto);
 		 			switch ($auth->role_id) {
 		 				case '1':
 		 					redirect('administrator/dashboard');
 		 					break;
 		 				
 		 				default:
 		 					# code...
 		 					break;
 		 			}
 		 		}
 		 		
 		 	}
 	}
 }