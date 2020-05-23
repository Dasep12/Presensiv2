
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
            <button data-toggle="modal" data-target="#modal-default" class="btn btn-primary" style="margin-bottom: 12px;"><i class="fa fa-plus"></i> Tambah Data Mahasiswa</button>
            <table id="example1" class="mt-4 table ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Program Studi</th>
                        <th>Kelas</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($mahasiswa as $mhs) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mhs->nama ?></td>
                        <td><?= $mhs->nim ?></td>
                        <td><?= $mhs->prodi ?></td>
                        <td><?= $mhs->kelas ?></td>
                        <td><?= $mhs->no_hp ?></td>
                        <td>
                            <a title="edit data" href="<?= base_url('administrator/mahasiswa/edit/'.$mhs->id) ?>"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Yakin Hapus')"  href="<?= base_url('administrator/mahasiswa/hapus/'.$mhs->id.'/'.$mhs->nim) ?>" title="hapus data" href=""><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
            </div>
    </div>
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data</h4>
              </div>
              <div class="modal-body">
              <form action="<?= base_url('administrator/mahasiswa/index') ?>" method="post">
                <div class="form-group">
                <label>Nama</label>
                <input type="text" required="" autocomplete="off" name="nama" placeholder="enter nama" class="form-control">
                <?= form_error('nama','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                <label>NIM</label>
                <input type="text" autocomplete="off" required="" name="nim" placeholder="enter nim" class="form-control">
                <?= form_error('nim','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                <label>Prodi</label>
                <select name="prodi" class="form-control">
                <option>Sistem Informasi</option>
                <option>Teknik Informatika</option>
                </select>
                </div>

                 <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" class="form-control">
                <option>MA</option>
                <option>MB</option>
                <option>MC</option>
                </select>
                </div>

                <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" autocomplete="off" name="tempat_lahir" required="" placeholder="enter tempat lahir" class="form-control">
                </div>

                <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="text"  autocomplete="off" name="tgl_lahir" required="" id="datepicker" placeholder="YYYY-MM-DD" class="form-control">
                </div>

                <div class="form-group">
                <label>NO HP</label>
                <input type="text" maxlength="12" autocomplete="off"  name="no_hp" required="" placeholder="enter no handhphone" class="form-control">
                </div>

                <div class="form-group">
                <label>Contact Oranag Tua</label>
                <input type="text" maxlength="12" autocomplete="off" name="no_orangtua" required="" placeholder="enter nim" class="form-control">
                </div>

                <div class="form-group">
                <label>Alamat</label>
                <textarea type="text" name="alamat" required="" class="form-control"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
             
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <script type="text/javascript">
            function gagal() {
                                swal({
                                    title: "Oops Gagal",
                                    text: "NIM Sudah Terdaftar",
                                    icon: "warning",
                                    dangerMode: true,
                                    buttons: [false, "OK"],
                                  }).then(function() {
                                    window.location.href="<?= base_url('administrator/mahasiswa') ?>";
                                  });
                            }
            function berhasil() {
                                swal({
                                    title: "Berhasil",
                                    text: "Data Tersimpan",
                                    icon: "success",
                                    buttons: [false, "OK"],
                                  }).then(function() {
                                     window.location.href="<?= base_url('administrator/mahasiswa') ?>";
                                  });
                            }
        function hapus() {
            swal({
                title: "Berhasil",
                text: "Data Terhapus",
                icon: "success",
                buttons: [false, "OK"],
              }).then(function() {
                 window.location.href="<?= base_url('administrator/mahasiswa') ?>";
              });
        }
        </script>
        <!-- /.modal -->
        <?php if($this->session->flashdata('pesan')){ ?>

            <script>
                gagal();
            </script>

        <?php }elseif($this->session->flashdata('pesan2')){ ?>
            <script>
                berhasil();
            </script>

        <?php }elseif($this->session->flashdata('pesan3')){ ?>
            <script>
               hapus();
            </script>
        <?php } ?>
    </section>
    <!-- /.content -->

