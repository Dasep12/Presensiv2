<?php
 /**
 * 
 */
 class M_absen extends CI_Model
 {
 	
/* 	function __construct()
 	{
 		# code...
 	}*/




 	//menampilkan data mahasiswa yang telah melakukan absensi
 	public function outputAbsen($nim = NULL , $tanggal = NULL)
 	{
 		return $this->db->get_where('absensi2' , array('nim' => $nim , 'tanggal' => $tanggal ))->row();
 	}

 	//ambil data untuk mengecek keberadaan nama dan nim mahasiswa
 	public function  ambilNimmhs($nim)
 	{
 		return $this->db->get_where('mahasiswa' , array('nim'	=> $nim))->num_rows();
 	}

 	//mengecek data nim mahasiswa untuk di tampilkan
 	public function cekmasuk($where = NULL)
		{
			return $this->db->get_where('mahasiswa',array('nim'	=> $where))->row();
		}



 	//mengecek data absensi harian sudah absen apa belum
 	public function cekAbsensi($tanggal , $nim)
 	{
 		$result =  $this->db->get_where('absensi2', array('nim' =>  $nim , 'tanggal' => $tanggal));

 			if ($result->num_rows() > 0 ) {
 				return $result->num_rows();
 			}else{
 				return $result->row();
 			}
 	}

 	//masukan data inputan absensi masuk mahasiswa
 	public function inputAbsen($data, $table)
 	{
 		return $this->db->insert('absensi2' , $data);
 	}

 	//update absensi pulang mahasiswa
 	public function inputPulang($data, $table , $where)
 	{
 		$this->db->where($where);
 		return $this->db->update($data,$table);
 	}

 	//cek data absen pulang pergi mahasiswa
 	public function pulangPergi($nim , $tanggal)
 	{
 		return $this->db->get_where('absensi2' , array('nim'	=> $nim , 'tanggal'	=> $tanggal))->row();
 	}
 }


 	//End of file
	//Folder Location : application/Models/m_absen.php