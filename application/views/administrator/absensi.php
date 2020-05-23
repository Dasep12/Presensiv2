
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Presensi Mahasiswa Swadharma</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group col-lg-3">
            <form action="<?= base_url('administrator/absenmhs/report') ?>" method="post">
            <label>NIM</label>
              <select name="nim" class="form-control select2" style="width: 100%;">
                <option value="">- Pilih NIM -</option>
                  <?php foreach($mahasiswa as $mhs) : ?>
                    <option value="<?= $mhs->nim ?>"><?= $mhs->nim . ' - ' . $mhs->nama ?></option>
                  <?php endforeach ?>
                </select>
              </div>
                <div class="form-group  col-lg-3">
                <label>Dari Tanggal</label>
                 <input type="text" name="tanggal1"  class="form-control" id="datepicker">
                 </div>
                 <div class="form-group  col-lg-3 ">
                 <label>Sampai Tanggal</label>
                  <input type="text" name="tanggal2"   class="form-control" id="datepicker2">
                </div>
                  <div class="mt-5" style="margin-top: 25px;">
                    <button type="submit" name="preview" class="btn btn-primary">Preview Report</button>
                  </div>
            </div>
    </div>
<?php 
if (isset($_POST['preview'])) {
   if ($absensi == NULL) { ?>
    <div class="alert alert-danger"><center>Data Kosong</center></div>
<?php   }else{ ?>
    <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?= base_url('administrator/laporanpdf/index/'.$tanggal1 .'/'. $tanggal2 .'/'.$nim) ?>" class="btn btn-danger btn-sm mb-5" style="margin-bottom: 20px;"><i class="fa fa-file-pdf-o"></i> Export to PDF</a>
            <table id="example1" class="mt-2 table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Program Studi</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($absensi as $mhs) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mhs->tanggal ?></td>
                        <td><?= $mhs->nama ?></td>
                        <td><?= $mhs->nim ?></td>
                        <td><?= $mhs->prodi ?></td>
                        <td><?= $mhs->masuk ?></td>
                        <td><?= $mhs->pulang ?></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
    </div>
<?php   }
}
  # code...
?>
    </section>
    <!-- /.content -->

