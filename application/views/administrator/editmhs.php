
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

     <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
              <form method="POST" action="<?= base_url('administrator/mahasiswa/update/') ?>" >
                <label>Nama</label>
                <input type="hidden" name="kodemhs" value="<?= $mahasiswa->kodemhs ?>">
                <input type="hidden" name="id" value="<?= $mahasiswa->id ?>">
                <input type="text" required="" autocomplete="off" name="nama" value="<?= $mahasiswa->nama ?>" class="form-control">
                </div>

                <div class="form-group">
                <label>NIM</label>
                <input type="text" value="<?= $mahasiswa->nim ?>" autocomplete="off" required="" name="nim" placeholder="enter nim" class="form-control">
                </div>

                <div class="form-group">
                <label>Prodi</label>
                <select name="prodi" class="form-control">
                <option><?= $mahasiswa->prodi ?></option>
                <option>Sistem Informasi</option>
                <option>Teknik Informatika</option>
                </select>
                </div>

                 <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" class="form-control">
                <option><?= $mahasiswa->kelas ?></option>
                <option>MA</option>
                <option>MB</option>
                <option>MC</option>
                </select>
                </div>

                <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" value="<?= $mahasiswa->tempat_lahir ?>" autocomplete="off" name="tempat_lahir" required="" placeholder="enter tempat lahir" class="form-control">
                </div>

                <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text"  value="<?= $mahasiswa->tgl_lahir ?>" autocomplete="off" name="tgl_lahir" required="" id="datepicker" placeholder="YYYY-MM-DD" class="form-control">
                </div>

                <div class="form-group">
                <label>NO HP</label>
                <input type="text" value="<?= $mahasiswa->no_hp ?>" maxlength="12" autocomplete="off"  name="no_hp" required="" placeholder="enter no handhphone" class="form-control">
                </div>

                <div class="form-group">
                <label>Contact Oranag Tua</label>
                <input type="text" value="<?= $mahasiswa->no_orangtua ?>" maxlength="12" autocomplete="off" name="no_orangtua" required="" placeholder="enter nim" class="form-control">
                </div>

                <div class="form-group">
                <label>Alamat</label>
                <textarea type="text" name="alamat" required="" class="form-control"><?= $mahasiswa->alamat ?></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Data Mahasiswa</button>
                <a href="<?= base_url('administrator/mahasiswa/index') ?>" class="btn btn-info">Kembali</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
<script type="text/javascript">
     function berhasil() {
                        swal({
                            title: "Berhasil",
                            text: "Data Tersimpan",
                            icon: "success",
                            buttons: [false, "OK"],
                          }).then(function() {
                             window.location.href="<?= base_url('administrator/mahasiswa/edit/'.$mahasiswa->id) ?>";
                          });
                    }
</script>
        <?php if($this->session->flashdata('pesan2')){ ?>
            <script>
               berhasil();
            </script>
        <?php } ?>
    </section>
    <!-- /.content -->

