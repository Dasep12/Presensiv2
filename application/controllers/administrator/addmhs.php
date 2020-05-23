<?php

 /**
 * 
 */
 class Addmhs extends CI_Controller
 {
     
public function __construct()
    {
        parent::__construct();
            if(empty($this->session->userdata('role_id'))){
                $this->session->set_flashdata('pesan','<div class="alert alert-info"><center>Anda Harus Login Dulu</center></div>');
                redirect('administrator/login/');
            }
    }
     
     //nama file yang akan di upload di rename
     private $filename = "import_data";

     public function index()
     {
        $data = array();

        if (isset($_POST['preview'])) {
            $upload = $this->admin_presensi->uploadmhs($this->filename);
                if ($upload['result'] =="success") {
                    // Load plugin PHPExcel nya
                    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
                    
                    $excelreader = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('upload/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
                    
                    // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                    // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                    $data['sheet'] = $sheet;
                }else{
                    $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                }
        }

        $this->template->load('template/template','administrator/addmhs',$data);
     }


     public function tambah()
     {
        date_default_timezone_set('Asia/Jakarta');
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('upload/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
       
        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();
        
        $numrow = 1;
        $s = date('s');
        foreach($sheet as $row){
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            $nim = $row['B'];

            $mahasiswa = $this->m_presensi->get_data($nim);
            if($mahasiswa > 0 ){
             $this->session->set_flashdata('pesan2','Gagal');
             redirect("administrator/addmhs/index");
            }elseif($numrow > 1){

                // Kita push (add) array data ke variabel data
                array_push($data, array(
                    'nama'           => $row['A'],
                    'nim'            => $row['B'],
                    'prodi'          => $row['C'],
                    'alamat'         => $row['D'],
                    'tempat_lahir'   => $row['E'],
                    'tgl_lahir'      => $row['F'],
                    'no_hp'          => $row['G'],
                    'no_orangtua'    => $row['H'],
                    'kelas'          => $row['I'],
                    'kodemhs'        => substr($row['B'], 4,4)

                ));

            }
            
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->admin_presensi->tambah($data);
        $this->session->set_flashdata('pesan','<div class="alert alert-danger"><center>Data Mahasiswa Bertambah</center></div>');
        redirect("administrator/addmhs/index"); // Redirect ke halaman awal (ke controller siswa fungsi index)
     }
 }