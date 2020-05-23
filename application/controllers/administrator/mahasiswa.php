<?php

 /**
 * 
 */
 class Mahasiswa extends CI_Controller
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
 		$this->form_validation->set_rules('nama','nama','required',[
 			'required'	=> 'nama tidak boleh kosong'
 		]);


 		$nim = $this->input->post('nim');
 		$where = $nim ;
 		$master = $this->admin_presensi->ceknik($where); 

 			if ($this->form_validation->run() == FALSE) {
 				$data['mahasiswa']	= $this->admin_presensi->getmhs();
				$this->template->load('template/template','administrator/mahasiswa',$data);
				
 			}else{
 				if($master->nim == $nim){
 								$this->session->set_flashdata('pesan','Gagal');
 								redirect('administrator/mahasiswa/index');
 				}else{
							$data1 = array(
 								'nama'			=> $this->input->post('nama'),
 								'nim'			=> $this->input->post('nim'),
 								'prodi'			=> $this->input->post('prodi'),
 								'alamat'		=> $this->input->post('alamat'),
 								'tempat_lahir'	=> $this->input->post('tempat_lahir'),
 								'tgl_lahir'		=> $this->input->post('tgl_lahir'),
 								'no_hp'			=> $this->input->post('no_hp'),
 								'no_orangtua'	=> $this->input->post('no_orangtua'),
 								'kelas'			=> $this->input->post('kelas'),
 								'kodemhs'		=> substr($this->input->post('nim'), 4,4)
 							);

 							$data2 = array(
				                'nama'			=> $this->input->post('nama'),
 								'nim'			=> $this->input->post('nim'),
 								'prodi'			=> $this->input->post('prodi'),
 								'no_orangtua'	=> $this->input->post('no_orangtua'),
 								'kelas'			=> $this->input->post('kelas'),
 								'tanggal'		=> date('Y-m-d'),
				            	'kodemhs'		=> substr($this->input->post('nim'), 4,4)
				            );

 								$this->admin_presensi->tambah3($data1,'mahasiswa');
 								$this->admin_presensi->tambah2($data2);
 								$this->session->set_flashdata('pesan2','Berhasil');
 								redirect('administrator/mahasiswa/index');
 				}	
 			} 				
 		
 	}

 	public function edit($where)
 	{
 		$data['mahasiswa']	= $this->admin_presensi->cekid($where);
 		$this->template->load('template/template','administrator/editmhs',$data);
 	}

 	public function update()
 	{
		$data = array(
					'nama'			=> $this->input->post('nama'),
					'nim'			=> $this->input->post('nim'),
					'prodi'			=> $this->input->post('prodi'),
					'alamat'		=> $this->input->post('alamat'),
					'tempat_lahir'	=> $this->input->post('tempat_lahir'),
					'tgl_lahir'		=> $this->input->post('tgl_lahir'),
					'no_hp'			=> $this->input->post('no_hp'),
					'no_orangtua'	=> $this->input->post('no_orangtua'),
					'kelas'			=> $this->input->post('kelas')
				);
		$data2 = array(
               		'nama'			=> $this->input->post('nama'),
					'nim'			=> $this->input->post('nim'),
					'prodi'			=> $this->input->post('prodi'),
					'no_orangtua'	=> $this->input->post('no_orangtua'),
					'kelas'			=> $this->input->post('kelas')
				 );

		//update table mahasiswa
		$where = array('kodemhs' => $this->input->post('kodemhs'));
		$this->admin_presensi->updatemhs('mahasiswa',$data,$where);


		//update table absensi
		$this->admin_presensi->updateabsen('absensi',$data2,$where);
		
		$this->session->set_flashdata('pesan2','Berhasil');
		redirect('administrator/mahasiswa/edit/'.$this->input->post('id'));
 	}


 	public function hapus($where1,$nim)
 	{
 		$where = array('id'		 => $where1);
 		$where2 = array('nim'	 => $nim );
 		$this->admin_presensi->hapusmhs($where);
 		$this->admin_presensi->hapusmhs2($where2);
 		$this->session->set_flashdata('pesan3','Berhasil');
 		redirect('administrator/mahasiswa/index');
 	}
 }