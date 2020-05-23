<?php


 /**
 * 
 */
 class Laporanpdf extends CI_Controller
 {

 	public function __construct()
 	{
 		parent::__construct();
 		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
		
 	}

 	public function index($tanggal1 , $tanggal2 , $nim)
 	{
 		$dompdf = new Dompdf();


 		$nim  ;
		$tgl1 = $tanggal1;
		$tgl2 = $tanggal2;

		$data['tanggal1'] = $tgl1; 
		$data['tanggal2'] = $tgl2;
		$where = $nim;
		$data['mahasiswa'] = $this->m_presensi->cekmasuk($where); 
		$data['absensi'] = $this->admin_presensi->reportabsen($tgl1 , $tgl2 , $nim)->result();
 		$html = $this->load->view('administrator/laporanpdf',$data,true);

 		$dompdf->load_html($html);
 		$dompdf->set_paper('A4','portrait');
 		$dompdf->render();
 		$pdf = $dompdf->output();

 		$dompdf->stream('laporanku.pdf', array('Attachment' => true));
 	}
 }