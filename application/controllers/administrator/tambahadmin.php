<?php

 /**
 * 
 */
 class Tambahadmin extends CI_Controller
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
 		$this->template->load('template/template','administrator/tambahadmin');
 	}

 	public function tambah()
 	{
 		$this->form_validation->set_rules('nama','nama','required',[
 			'required' => 'data nama tidak boleh di kosongkan'
 		]);
 		$this->form_validation->set_rules('pass','pass','required|matches[pass2]',[
 			'required'  => 'password tidak boleh di kosongkan',
 			'matches'	=> 'password harus sama '
 		]);
 		$this->form_validation->set_rules('pass2','pass2','required',[
 			'required' => 'password harus di isi juga '
 		]);

 			if ($this->form_validation->run() == FALSE) {
 				$this->index();
 			}elseif(empty($_FILES['gambar']['name'])){				
 						
 						$data = array(
 							'nama'		=> $this->input->post('nama'),
 							'pass'		=> $this->input->post('pass'),
 							'role_id'	=> $this->input->post('role_id')
 						);

 						$this->admin_presensi->addmhs($data,'admin');
 						$this->session->set_flashdata('pesan2','Berhasil');
 						redirect('administrator/tambahadmin');

 			}elseif(!empty($_FILES['gambar']['name'])){
 				$config['allowed_types']	= 'jpg|png|jpeg';
 				$config['upload_path']		= './profile';
 				$this->load->library('upload',$config);
 					if (!$this->upload->do_upload('gambar')) {
 						$this->session->set_flashdata('pesan1','Berhasil');
 						redirect('administrator/tambahadmin');
 					}else{
 						$gambar  = $this->upload->data('file_name');
 						$data = array(
 							'nama'		=> $this->input->post('nama'),
 							'pass'		=> $this->input->post('pass'),
 							'role_id'	=> $this->input->post('role_id'),
 							'poto'		=> $gambar
 						);

 						$this->admin_presensi->addmhs($data,'admin');
 						$this->session->set_flashdata('pesan2','Berhasil');
 						redirect('administrator/tambahadmin');
 					}

 				
 			}
 	}
 }