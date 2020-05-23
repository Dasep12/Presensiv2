<?php


 /**
 * 
 */
 class Rekapabsensi extends CI_Controller
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
 		$absen = $this->m_presensi->getrekap();
 		foreach($absen as $rekap){
						$data  = array(
							'nama'			=> $rekap->nama,
							'nim'			=> $rekap->nim,
							'tanggal'		=> $rekap->tanggal,
							'masuk'			=> $rekap->masuk,
							'pulang'		=> $rekap->pulang,
							'masuk'			=> $rekap->masuk,
							'prodi'			=> $rekap->prodi,
							'keterangan'	=> $rekap->keterangan,
							'status'		=> $rekap->status
						);
						$this->m_presensi->rekapabsen($data,'rekapbasen');
					};

					$data1 = array(
						'tanggal'		=> date('Y-m-d'),
						'masuk'			=> '',
						'pulang'		=> '',
						'keterangan'	=> '',
						'status'		=> ''
					);
					$this->m_presensi->updatepresensi('absensi',$data1);
					$this->session->set_flashdata('alert','Berhasil');
					redirect('administrator/dashboard/index');

 	}
 }