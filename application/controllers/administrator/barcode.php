<?php
 /**
 * 
 */
 class Barcode extends CI_Controller
 {
 	
public function __construct()
 	{
 		parent::__construct();
 			if(empty($this->session->userdata('role_id'))){
 				$this->session->set_flashdata('pesan','<div class="alert alert-info"><center>Anda Harus Login Dulu</center></div>');
 				redirect('administrator/login/');
 			}
 	}

 	public function barcodeCard($nim)
 	{
 		$this->load->library('zend');
 		$this->zend->load('Zend/Barcode');
 		Zend_barcode::render('code128','image', array('text' => $nim));
 	}

 	public function index()
 	{
 		$this->form_validation->set_rules('nim','nim','required',[
 			'required'	=> 'data harus di isi'
 		]);
 			if ($this->form_validation->run() == FALSE ) {
		 		$data['mahasiswa'] = $this->m_presensi->getMHS();
		 		$data['mhs']	= $this->admin_presensi->getabsensi();
				$this->template->load('template/template','administrator/barcode',$data);
 			}else{
 				$where = $this->input->post('nim');
 				$nim = $where;
 				$data['mahasiswa'] = $this->m_presensi->ambilDataNIM($nim);
 				$data['mhs']	= $this->admin_presensi->getabsensi();
 				$this->template->load('template/template','administrator/barcode',$data);
 			}
 	}

 	public function printcard()
 	{

 	}

 	public function print()
 	{
 		$data['mahasiswa'] = $this->m_presensi->getMHS();
 		$this->load->view('administrator/printbarcode',$data);
 	}

 	public function cetak($nim)
 	{
 		$data['mahasiswa'] = $this->m_presensi->ambilDataNIM($nim);
 		$this->load->view('administrator/cetak',$data);
 	}
 }