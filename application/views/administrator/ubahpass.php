
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

     <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ganti Password Administrator</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
              <form action="<?= base_url('administrator/ubahpass/update') ?>"  method="post" enctype="multipart/form-data" >
                <div class="form-group">
                 <center> <img src="<?= base_url() ?>profile/<?= $this->session->userdata('poto') ?>" id="gambar_nodin" class="img-thumbnail"> </center>
                </div>

           
          </div>

          </div>
      </div>

        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label>New Password</label>
                  <input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>">
                  <input type="password" maxlength="6"  autocomplete="off" name="pass" class="form-control">
                  <?= form_error('pass','<div class="text-danger small">','</div>') ?>
                </div>

                <div class="form-group">
                  <label>Re-write Password</label>
                  <input type="password" maxlength="6" value="<?= set_value('pass2') ?>"  autocomplete="off" name="pass2" class="form-control">
                  <?= form_error('pass2','<div class="text-danger small">','</div>') ?>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary"><i class="fa fa-check"></i> Simpan Data </button>
                <button type="reset" class="btn btn-info"><i class="fa fa-history"></i> Reset</button>
              </div>
               </form>
                

        <!-- /.box -->
<script type="text/javascript">
     function berhasil() {
                        swal({
                            title: "Berhasil",
                            text: "Data Tersimpan",
                            icon: "success",
                            buttons: [false, "OK"],
                          }).then(function() {
                             window.location.href="<?= base_url('administrator/logout/') ?>";
                          });
                    }
</script>
        <?php if($this->session->flashdata('alert')){ ?>
            <script>
               berhasil();
            </script>
        <?php } ?>
    </section>
    <!-- /.content -->

