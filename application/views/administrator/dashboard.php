<?php date_default_timezone_set('Asia/Jakarta') ?>
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $count_mhs ?></h3>

              <p>Total Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $count_si ?><sup style="font-size: 20px"></sup></h3>

              <p>Sistem Informasi</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $count_ti ?></h3>

              <p>Teknik Informatika</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
          </div>
        </div>


<div class="row col-md-12">
        <div class="col-lg-12  col-md-12">
          <div class="box">
            <div class="box-header">

                <?php if( $total > 0   ) : ?>
                <a href="<?= base_url('administrator/dashboard/index') ?>" class="btn btn-danger btn-sm "><i class="fa fa-history"></i> Reset Pencarian</a>
                <?php endif ?>

              <hr>
              <div class="box-tools">
              <form method="post" action="<?= base_url('administrator/dashboard/search') ?>">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="keyword" class="form-control pull-right" placeholder="Search">
                  <div class="pull pull-right" style="margin-left: 12px;">
            </div>
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
        
              <table class="table table-hover">
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Kelas</th>
                  <th>Tanggal</th>
                  <th>Masuk</th>
                  <th>Pulang</th>
                  <th>Status</th>
                </tr>
                <?php foreach($mahasiswa as $mhs) : ?>
                <tr>
                  <td><?= $mhs->nim ?></td>
                  <td><?= $mhs->nama ?></td>
                  <td><?= $mhs->prodi ?></td>
                  <td><?= $mhs->kelas ?></td>
                  <td><?= $mhs->tanggal ?></td>
                  <td><?= $mhs->masuk ?></td>
                  <td><?= $mhs->pulang ?></td>
                  <td>
                    <?php if($mhs->status == 'Hadir'){
                      echo "Hadir";
                    }elseif($mhs->status == 'Ijin'){
                      echo "Ijin";
                    }elseif ($mhs->status== 'Sakit') {
                      echo "Sakit";
                    }elseif($mhs->status == 'Hadir' && empty($mhs->pulang)){
                      echo "Lupa Absen Pulang";
                    } ?>
                  </td>
              <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
<script type="text/javascript">
       function berhasil() {
                            swal({
                                title: "Berhasil",
                                text: "Data Absensi Di Rekap ",
                                icon: "success",
                                buttons: [false, "OK"],
                              }).then(function() {
                                 window.location.href="<?= base_url('administrator/dashboard/index') ?>";
                              });
                        }

   function gagal() {
                            swal({
                                title: "Perhatian",
                                text: "Keyword tidak boleh kosong ",
                                 icon: "warning",                                
                                buttons: [false, "OK"],
                              }).then(function() {
                                 window.location.href="<?= base_url('administrator/dashboard/index') ?>";
                              });
                        }                        
</script>
<?php if($this->session->flashdata('alert')) { ?> 
<script type="text/javascript">
  berhasil();
</script>

<?php }elseif($this->session->flashdata('pesan')){ ?> 
<script type="text/javascript">
  gagal();
</script>

<?php } ?>
<div class="modal fade" id="modal-default">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
              <form action="<?= base_url('administrator/rekapabsensi/index') ?>" method="post">
                <p>Yakin Mau Rekap Data Absen Sekarang ? </p>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Ngga Deh </button>
                <button type="submit"  class="btn btn-primary">Ya,Saya Yakin</button>
              </div>
              </a>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  <!-- /.content-wrapper -->
    </section>
