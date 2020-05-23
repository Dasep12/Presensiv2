
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Mahasiswa Swadharma</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <div class="form-inline">
                    <form method="post" enctype="multipart/form-data" action="<?= base_url('administrator/addmhs/index') ?>">
                    <label><i class="fa fa-file-excel-o"></i> Upload File Excel</label>
                    <input type="file" name="file" class="form-control">
                    <input type="submit" name="preview" class="btn btn-primary btn-sm ml-2" value="List Data">
                    <a href="<?= base_url() ?>upload/upload.xlsx" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Download Format Upload File</a>
                </form>
                </div>
    <script>
     function berhasil() {
                            swal({
                                title: "Berhasil",
                                text: "Data Tersimpan",
                                icon: "success",
                                buttons: [false, "OK"],
                              }).then(function() {
                                 window.location.href="<?= base_url('administrator/addmhs/index') ?>";
                              });
                        }
    function gagal() {
                            swal({
                                title: "Gagal",
                                text: "Data NIM Sudah Ada",
                                icon: "warning",
                                buttons: [false, "OK"],
                              }).then(function() {
                                 window.location.href="<?= base_url('administrator/addmhs/index') ?>";
                              });
                        }
    </script>
<?php if($this->session->flashdata('pesan')) { ?>
    <script>
        berhasil();
    </script>
 <?php }elseif($this->session->flashdata('pesan2')){ ?>
    <script>
        gagal();
    </script>
 <?php } ?>
<?php
 if (isset($_POST['preview'])) {
    if (isset($upload_error)) {
    echo "<div class='text-danger'>Anda Harus upload dulu file .xlsx dulu untuk bisa preview </div>";
    }else{ ?>
    <form action="<?= base_url('administrator/addmhs/tambah/') ?>" method="post">
 <table class="table table-striped table-bordered table-hover" id="example1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Alamat</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>NO HP</th>
            <th>No HP Wali</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($sheet as $mhs) : ?>
        <tr>
            <td><?= $mhs['A'] ?></td>
            <td><?= $mhs['B'] ?></td>
            <td><?= $mhs['C'] ?></td>
            <td><?= $mhs['D'] ?></td>
            <td><?= $mhs['E'] ?></td>
            <td><?= $mhs['F'] ?></td>
            <td><?= $mhs['G'] ?></td>
            <td><?= $mhs['H'] ?></td>
            <td><?= $mhs['I'] ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<button type="submit" class="btn btn-success"><i class="fa  fa-cloud-upload"></i> Upload Data </button>
</form>
<?php } 
}
?>
            </div>
    </div>

    </section>
    <!-- /.content -->

