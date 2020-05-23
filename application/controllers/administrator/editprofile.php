<?php

 /**
 * 
 */
 class Editprofile extends CI_Controller
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
 		$where  = $this->session->userdata('id');

 		$data['admin'] = $this->admin_presensi->getprofile($where);
 		$this->template->load('template/template','administrator/editprofile',$data);
 	}

 	public function update()
 	{
 		if (empty($_FILES['gambar']['name'])) {
 			
 			$data = array(
 				'nama'		=> $this->input->post('nama'),
 				'role_id'	=> $this->input->post('role_id')
 			);
 			$where  = array('id' =>$this->session->userdata('id') ) ;
 			$this->admin_presensi->editpass($data,'admin',$where);
 			$this->session->set_flashdata('alert','Berhasil');
 			redirect('administrator/editprofile');

 		}elseif(!empty($_FILES['gambar']['name'])){

 			$config['allowed_types']	= 'jpg|png|jpeg|gif';
 			$config['upload_path']		= './profile/';
 			$this->load->library('upload',$config);
 				if (!$this->upload->do_upload('gambar')) {
 					$this->session->set_flashdata('alert2','Gagal');
 					redirect('administrator/editprofile');
 				}else{
 					$gambar = $this->upload->data('file_name');
 					$data = array(
		 				'nama'		=> $this->input->post('nama'),
		 				'role_id'	=> $this->input->post('role_id'),
		 				'poto'		=> $gambar
 					);

		 			$where  = array('id' =>$this->session->userdata('id') ) ;
		 			$this->admin_presensi->editpass($data,'admin',$where); 
		 			$this->session->set_flashdata('alert','Berhasil');
		 			redirect('administrator/editprofile');
 				}

 		}
 	}
 }