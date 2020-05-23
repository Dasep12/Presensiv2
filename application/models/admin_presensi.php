<?php

 /**
 * 
 */
 class Admin_presensi extends CI_Model
 {
 	
/* 	public function __construct()
 	{
 		# code...
 	}*/

 	public function getmhs()
 	{
 		return $this->db->get('mahasiswa')->result();
 	}

 	public function getabsensi()
 	{
 		return $this->db->get('mahasiswa')->result();
 	}

 	//update absensi secara manual
 	public function manualabsen($data,$table ,$where)
 	{
 		$this->db->where($where);
 		return $this->db->update($data,$table);
 	}

 	//upload file untuk menambah data mahasiswa
 	public function uploadmhs($filename)
 	{

 		$this->load->library('upload');
 		$config['upload_path']		= './upload';
 		$config['allowed_types']	='xlsx';
 		$config['max_size']			='2048';
 		$config['overwrite']		=true ;
 		$config['file_name']		= $filename;

 		$this->upload->initialize($config);
 			if ($this->upload->do_upload('file')) {
 				//jik berhasil
 				$return = array('result' => 'success' , 'file'	=> $this->upload->data() , 'error' => '');
 				return $return; 
 			}else{
 				$return = array('result' => 'gagal' , 'file' => '' , 'error' => $this->upload->display_errors());
 				return $return;
 			}
 	}



 	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function tambah($data)
	{
		$this->db->insert_batch('mahasiswa', $data);
	}


// Buat sebuah fungsi untuk melakukan insert ke tabel mahasiswa
	public function tambah3($data1)
	{
		return $this->db->insert('mahasiswa', $data1);
	}

//	ambil data mahasiswa untuk dicek sudah terdafta apa belum
	//mengetahui siswa sudah absen masuk apa belum
	public function ceknik($where = NULL)
	{
		return $this->db->get_where('mahasiswa',array('nim'	=> $where))->row();
	}

 	public function addmhs($data,$table)
 	{
 		return $this->db->insert($table,$data);
 	}


 	//untuk report absensi per tanggal
 	public function reportabsen($tgl1,$tgl2,$nim)
 	{
 		$this->db->where('nim', $nim);
 		$this->db->where('tanggal >=', $tgl1);
 		$this->db->where('tanggal <=', $tgl2);
 		return $this->db->get('absensi2');
 	}

 	//update data mahasiswa 
 	public function updatemhs($data,$table,$where)
 	{
 		$this->db->where($where);
 		return $this->db->update($data,$table);
 	}

 	//update data tabel absensi berdasarkan update table mahasiswa
 	public function updateabsen($data2,$table,$where)
 	{
 		$this->db->where($where);
 		return $this->db->update($data2,$table);
 	}


 	//form edit
 	//mengetahui siswa sudah absen masuk apa belum
	public function cekid($where2 = NULL)
	{
		return $this->db->get_where('mahasiswa',array('id'	=> $where2))->row();
	}

	//hapus data mahasiswa
	public function hapusmhs($where)
 	{
 		$this->db->where($where);
 		return $this->db->delete('mahasiswa');
 	}
 		

 	//hapus data mahasiswa di absensi
	public function hapusmhs2($where2)
 	{
 		$this->db->where($where2);
 		return $this->db->delete('absensi2');
 	}

 	//menghitung seluruh jumlah mahasiswa 
 	public function countmhs()
 	{
 		return $this->db->get('mahasiswa')->num_rows();
 	}

 	//menghitung seluruh jumlah mahasiswa sistem informasi 
 	public function countsi()
 	{
 		return $this->db->get_where('mahasiswa', array('prodi' => 'Sistem Informasi'))->num_rows();
 	}

 	//menghitung seluruh jumlah mahasiswa sistem informasi 
 	public function countti()
 	{
 		return $this->db->get_where('mahasiswa', array('prodi' => 'Teknik Informatika'))->num_rows();
 	}

 	//tracking absensi
	public function trackingabsen($tgl)
	{
		return $this->db->where('tanggal',$tgl)->order_by('masuk','DESC')->order_by('pulang','DESC')->limit(5)->get('absensi2')->result();
	}

	//menampilkan pencarian data mahasiswa
	public function cari($keyword)
	{
		$this->db->select('*');
 		$this->db->from('absensi2');
 		$this->db->like('nama',$keyword);
 		$this->db->or_like('nim',$keyword);
 		return $this->db->get()->result();
	}

	public function resetcari($keyword = NULL)
	{
		$this->db->select('*');
 		$this->db->from('absensi2');
 		$this->db->like('nama',$keyword);
 		$this->db->or_like('nim',$keyword);
 		
 		return $this->db->get()->num_rows();

	}

	//ganti password administartor
	public function editpass($table,$data,$where)
	{
		$this->db->where($where);
		return $this->db->update($data,$table);
	}

	//menampilkan data profile administator
	public function getprofile($where = NULL)
	{
		return $this->db->get_where('admin',array('id'	=> $where))->row();
	}

 }