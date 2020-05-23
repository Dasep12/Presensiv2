
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
              <h3 class="box-title">Edit Administrator </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
              <form action="<?= base_url('administrator/editprofile/update') ?>"  method="post" enctype="multipart/form-data" >
                <div class="form-group">
                 <center> <img src="<?= base_url('profile/'.$admin->poto) ?>" id="gambar_nodin" class="img-thumbnail"> </center>
                </div>
                <input type="file" name="gambar" id="preview_gambar" class="form-control">
           
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
                  <label>Nama</label>
                  <input type="text" value="<?= $admin->nama ?>" autocomplete="off" name="nama" class="form-control">
                  <?= form_error('nama','<div class="text-danger small">','</div>') ?>
                </div>


                <div class="form-group">
                  <label>Role ID</label>
                  <select name="role_id" class="form-control">
                  <option>1</option>
                  <option>0</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="upload" class="btn btn-primary"><i class="fa fa-check"></i> Simpan Data </button>
                <button type="reset" class="btn btn-info"><i class="fa fa-history"></i> Reset</button>
              </div>
               </form>
                <!-- 
<script type="text/javascript" src="<?= base_url('assets/vendors/jquery-1.9.1.js') ?>"></script> -->
<script>
    function bacaGambar(input){
        if(input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e){
                $('#gambar_nodin').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function(){
        bacaGambar(this);
    })
</script>
        <!-- /.box -->
<script type="text/javascript">
     function berhasil() {
                swal({
                    title: "Berhasil",
                    text: "Data Tersimpan",
                    icon: "success",
                    buttons: [false, "OK"],
                  }).then(function() {
                     window.location.href="<?= base_url('administrator/editprofile/index/') ?>";
                  });
            }

      function ketemu(){
                swal({
                    title: "PERHATIAN!",
                    text: "file tidak dibolehkan",
                    icon: "warning",
                    dangerMode: true,
                    buttons: [false, "OK"],
                }).then(function() {
                    window.location.href="<?= base_url('administrator/editprofile/index/') ?>";
                })
              }
</script>
        <?php if($this->session->flashdata('alert')){ ?>
            <script>
               berhasil();
            </script>
        <?php }elseif($this->session->flashdata('alert2')) { ?>
          <script>
            ketemu();
          </script>
         <?php } ?>
    </section>
    <!-- /.content -->
