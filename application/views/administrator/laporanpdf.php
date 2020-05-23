<html><head> <link rel="stylesheet" href="assetsv2/bower_components/bootstrap/dist/css/bootstrap.min.css"><title></title></head><body>
<center>
 <img src="assets/img/stmik.jpg"><h2 style="color: #000;margin-bottom: 10px;">Laporan Presensi Mahasiswa STMIK SWADHARMA</h2>
 </center><br>
<table class="table" style="margin-top: 10px;" >
	<tr>
	<td>NIM</td>
	<td></td>
	<td>:</td>
	<td><?= $mahasiswa->nim ?></td>
	</tr>
	<tr>
	<td>Nama</td>
	<td></td>
	<td>:</td>
	<td> <?= $mahasiswa->nama ?></td>
	</tr>
	<tr>
		<td>Periode</td>
		<td></td>
		<td>:</td>
		<td><?= $tanggal1 .' s/d '.$tanggal2 ?></td>
	</tr>
</table>



<br>
<center><div class="line" style="width: 100%;border-bottom: 2px solid #000"></div></center>
<br>
 <table border="1" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Program Studi</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody align="center">
                <?php $no=1; foreach($absensi as $mhs) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mhs->tanggal ?></td>
                        <td><?= $mhs->nama ?></td>
                        <td><?= $mhs->nim ?></td>
                        <td><?= $mhs->prodi ?></td>
                        <td><?= $mhs->masuk ?></td>
                        <td><?= $mhs->pulang ?></td>
                        <td>
                        	<?php
                        		if(empty($mhs->keterangan) && empty($mhs->masuk) && empty($mhs->pulang)){
                        			echo "Alfa";
                        		}elseif($mhs->keterangan == 'Sakit'){
                        			echo "Sakit";
                        		}else{
                                    echo "Hadir";
                                }
                        	 ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody></body></html>
