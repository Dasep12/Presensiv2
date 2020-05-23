<?php
	/**
	* 
	*/
	class M_presensi extends CI_Model
	{
		
		//menampilkan histori absen masuk pulang siswa
		public function getMHS()
		{
			return $this->db->get('mahasiswa')->result();
		}

		//menghitung data siswa yang terdaftar di presensi
		public function get_data($nim)
		{
			return $this->db->where('nim',$nim)->get('mahasiswa')->num_rows();
		}

		//mengambil nim untuk ditampilkan di barcode
		public function ambilDataNIM($nim)
		{
			return $this->db->get_where('mahasiswa', array('nim' => $nim))->row();
		}
		//masukan absensi masuk siswa
		/*public function absenmasuk($table,$data,$where)
		{
			$this->db->where($where);
			return $this->db->update($data,$table);
		}*/

		//mengetahui siswa sudah absen masuk apa belum
		public function cekmasuk($where = NULL)
		{
			return $this->db->get_where('mahasiswa',array('nim'	=> $where))->row();
		}

		//rekap absen 
		/*public function rekapabsen($data,$table)
		{
			return $this->db->insert('rekapabsen',$data);
		}

		//menampilkan data histori absen masuk pulang  siswa untuk di rekap
		public function getrekap()
		{
			return $this->db->get('absensi')->result();
		}

		//update rekap absensi
		public function updatepresensi($table,$data1)
		{
			return $this->db->update('absensi',$data1);
		}
*/

	

	}