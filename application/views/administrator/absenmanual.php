

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Absen Manual Mahasiswa Swadharma</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                <form action="<?= base_url('administrator/absenmanual/') ?>" method="post">
                <label>NIM Mahasiswa</label>
                <select name="nim" class="form-control select2" style="width: 100%;">
                <option value=""> - Pilih NIM - </option>
                  <?php foreach($mahasiswa as $mhs) : ?>
                    <?php if(empty($mhs->masuk)) : ?>
                    <option value="<?= $mhs->nim ?>"><?= $mhs->nim . ' - ' . $mhs->nama ?></option>
                  <?php endif ?>
                  <?php endforeach ?>
                </select>
                <?= form_error('nim','<div class="text-danger small">','</div>'); ?>
              </div>
              <div class="form-group">
                 <label>Tanggal</label>
                  <input type="text" name="tanggal" value="<?= set_value('tanggal') ?>" class="form-control pull-right" id="datepicker">
                  <?= form_error('tanggal','<div class="text-danger small">','</div>'); ?>
                </div>
                 <div class="form-group">
                <label>Alasan Tidak Masuk</label>
                <select  name="status" class="form-control" style="width: 100%;">
                  <option>Sakit</option>
                  <option>Ijin</option>
                  <option>Alfa</option>
                </select>
                <?= form_error('status','<div class="text-danger small">','</div>'); ?>
              </div>
              <div class="form-group">
              <label>Keterangan</label>
              <textarea name="keterangan" class="form-control" ></textarea>
              <?= form_error('keterangan','<div class="text-danger small">','</div>'); ?>
              </div>

              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Absensi</button>
              <button type="reset" class="btn btn-danger"><i class="fa fa-history"></i> Reset </button>



            </div>
            <script type="text/javascript">
               function berhasil() {
                            swal({
                                title: "Berhasil",
                                text: "Data Tersimpan",
                                icon: "success",
                                buttons: [false, "OK"],
                              }).then(function() {
                                 window.location.href="<?= base_url('administrator/absenmanual') ?>";
                              });
                        }
            </script>
            <?php if($this->session->flashdata('pesan')) : ?>
              <script>
                berhasil();
              </script>
            <?php endif ?>

    </div>

    </section>
    <!-- /.content -->
