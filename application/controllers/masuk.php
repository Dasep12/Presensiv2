<?php

	/**
	* 
	*/
	class Masuk extends CI_Controller
	{
		public function hari()
		{
			date_default_timezone_set('Asia/Jakarta');
				$data['hari'] = date('D');
	                            switch ($data['hari']) {
	                                case 'Sun':
	                                    $data['hari']	=  "Minggu";
	                                    break;
	                                case 'Mon':
	                                    $data['hari']	= "Senin";
	                                    break;
	                                case 'Tue' :
	                                    $data['hari']	= "Selasa";
	                                break;
	                                case 'Wed' :
	                                    $data['hari']	= "Rabu";
	                                break;
	                                case 'Thu' :
	                                    $data['hari']	= "Kamis";
	                                break;
	                                case 'Fri' :
	                                   $data['hari']	= "Jumat";
	                                break;
	                                case 'Sat' :
	                                    $data['hari']	= "Sabtu";
	                                break;                                
	                                default:
	                                    # code...
	                                    break;
	                            };
	                      return  $data['hari'];	
		}
		
		public function bulan()
		{
			$data['bulan']	 	= date('m');
                     	switch ($data['bulan']) {
                     		case '01':
                     			$data['bulan']	= 'Januari';
                     			break;
                     		case '02':
                     			$data['bulan']	= 'Februari';
                     			break;
                     		case '03':
                     			$data['bulan']	= 'Maret';
                     			break;
                     		case '04':
                     			$data['bulan']	= 'April';
                     			break;
                     		case '05':
                     			$data['bulan']	= 'Mei';
                     			break;
                     		case '06':
                     			$data['bulan']	= 'Juni';
                     			break;
                     		case '07':
                     			$data['bulan']	= 'Juli';
                     			break;
                     		case '08':
                     			$data['bulan']	= 'Agustus';
                     			break;
                     		case '09':
                     			$data['bulan']	= 'September';
                     			break;
                     		case '10':
                     			$data['bulan']	= 'Oktober';
                     			break;
                     		case '11':
                     			$data['bulan']	= 'November';
                     			break;
                     		case '12':
                     			$data['bulan']	= 'Desember';
                     			break;
                     		
                     		default:
                     			# code...
                     			break;
                     	}
                     return $data['bulan'];
		}

		public function index()
		{
			
			$data['hari']	 = $this->hari();
            $data['bulan']	 = $this->bulan();         

			$tanggal = date('Y-m-d');
			if(!empty($this->session->userdata('nim')) && !empty($tanggal)){
				$nim 	 = $this->session->userdata('nim');
				$data['mahasiswa']	= $this->m_absen->outputAbsen($nim  , $tanggal);
			}else{
				$kemarin  = mktime(0,0,0, date('m') , date('d')-1 , date('y'));
				$nim = '19101051' ;
				$tanggal = date('Y-m-d' , $kemarin);
				$data['mahasiswa']	= $this->m_absen->outputAbsen($nim  , $tanggal);				
			}


			$this->load->view('masuk',$data);
		}

	
		

		public function absen2()
		{
			date_default_timezone_set('Asia/Jakarta');
			$nim 		= $this->input->post('nim');
			$tanggal 	= date('Y-m-d');

			$this->session->set_userdata('nim' , $nim );
			//cek data nim mahasiswa
			$nimMhs 	= $this->m_absen->ambilNimmhs($nim);

			//cek data mahasiswa sudah pernah absen apa belum
			$cekAbsensi	= $this->m_absen->cekAbsensi($tanggal , $nim);


			//cek presensi pulang pergi mahasiswa
			$presensi  = $this->m_absen->pulangPergi($nim , $tanggal);

			//cek nama mahaasiwa
			$where	  = $nim;
			$cekmasuk = $this->m_absen->cekmasuk($where);

			if (isset($_POST['simpan'])) {

				if (empty($nim)) {
					$this->session->set_flashdata('pesan','Masukan nim anda');
					redirect('masuk');
				}elseif($nimMhs <=0 ){
					$this->session->set_flashdata('pesan','Anda tidak terdaftar');
					redirect('masuk');

				//absensi masuk 
				}elseif ($nimMhs > 0 && $cekAbsensi <= 0 ) {
					
					$data = array(
						'nim'		=> $nim,
						'nama'		=> $cekmasuk->nama,
						'tanggal'	=> $tanggal,
						'prodi'		=> $cekmasuk->prodi,
						'kelas'		=> $cekmasuk->kelas,
						'masuk'		=> date('G:i:s')
					);

					//kirim chat kedatangan mahasiswa dengan WA API
						/*$apiURL = 'https://api.chat-api.com/instance82641/';
						$token = 'p9dvekly1mqciafk';

						$message = 'Kepada Wali Tua Murid,kami menyampaikan bahwa anak anda '.$cekmasuk->nama.' telah sampai di sekolah STMIK SWADHARMA pada pukul '. date('h:i:s ') . date(' Y-m-d') ;
						$phone = $cekmasuk->no_orangtua;

						$data23 = json_encode(
						    array(
						        'chatId'=>$phone.'@c.us',
						        'body'=>$message
						    )
						);
						$url = $apiURL.'message?token='.$token;
						$options = stream_context_create(
						    array('http' =>
						        array(
						            'method'  => 'POST',
						            'header'  => 'Content-type: application/json',
						            'content' => $data23
						        )
						    )
						);

						$ch = curl_init();
						curl_setopt_array($ch,array(
						CURLOPT_URL => $url,
						CURLOPT_RETURNTRANSFER => TRUE,
						CURLOPT_POST => TRUE,
						));
						$response = file_get_contents($url,false,$options);

						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

						$output = curl_exec($ch);
						if (curl_errno($ch)) {
						echo "error". curl_error($ch);
						}
						curl_close($ch)*/;


					$this->m_absen->inputAbsen($data,'absensi2');
					$this->session->set_flashdata('pesan','Selamat Datang <br>'.$cekmasuk->nama);
					redirect('masuk');

				//cek jika mahasiswa absen 2 kali
				}elseif(!empty($presensi->masuk) && !empty($presensi->pulang)){
					$this->session->set_flashdata('pesan','anda sudah absen pulang pergi hari ini');
					redirect('masuk');

				//absensi pulang mahasiswa
				}elseif($nimMhs > 0 && $cekAbsensi > 0 ){
						
					$where  = array('nim'	=> $nim , 'tanggal' => $tanggal);
					$data   = array(
						'pulang'	=> date('G:i:s'),
						'status'	=> 'Hadir'
					);

				//kirim chat dengan WA API
						/*$apiURL = 'https://api.chat-api.com/instance82641/';
						$token = 'p9dvekly1mqciafk';

						$message = 'Kepada Wali Tua Murid,kami menyampaikan bahwa anak anda '.$cekmasuk->nama.' telah pulang dari sekolah STMIK SWADHARMA pada pukul '. date('h:i:s ') . date(' Y-m-d') ;
						$phone = $cekmasuk->no_orangtua;

						$data23 = json_encode(
						    array(
						        'chatId'=>$phone.'@c.us',
						        'body'=>$message
						    )
						);
						$url = $apiURL.'message?token='.$token;
						$options = stream_context_create(
						    array('http' =>
						        array(
						            'method'  => 'POST',
						            'header'  => 'Content-type: application/json',
						            'content' => $data23
						        )
						    )
						);

						$ch = curl_init();
						curl_setopt_array($ch,array(
						CURLOPT_URL => $url,
						CURLOPT_RETURNTRANSFER => TRUE,
						CURLOPT_POST => TRUE,
						));
						$response = file_get_contents($url,false,$options);

						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

						$output = curl_exec($ch);
						if (curl_errno($ch)) {
						echo "error". curl_error($ch);
						}
						curl_close($ch);*/


					$this->m_absen->inputPulang('absensi2',$data, $where);
					$this->session->set_flashdata('pesan','Terima Kasih <br>'.$cekmasuk->nama);
					redirect('masuk');
				}

			}
		}

	}


	
	//End of file
	//Folder Location : application/controllers/Masuk.php