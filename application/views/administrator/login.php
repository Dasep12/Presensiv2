<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Adminitrator | Presensi Swadharma</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assetsv2/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assetsv2/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assetsv2/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assetsv2/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assetsv2/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
     <script type="text/javascript" src="<?= base_url() ?>/assetsv2/sweetalert-master/sweetalert.min.js"></script> 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>assetsv2/index2.html">Swadharma Center</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?= $this->session->flashdata('pesan') ?>
    <p class="login-box-msg">Login untuk memulai sesi anda</p>

    <form action="<?= base_url('administrator/login/ceklogin/') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" autocomplete="off" name="nama" class="form-control" placeholder="Yourname">
        <?= form_error('nama','<div class="text-danger small">','</div>') ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <?= form_error('pass','<div class="text-danger small">','</div>') ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>

        <!-- /.col -->
      </div>
<script type="text/javascript">
     function berhasil() {
                        swal({
                            title: "Gagal",
                            text: "Oops Data Tidak Ada",
                            icon: "warning",
                            dangerMode: true,
                            buttons: [false, "OK"],
                          }).then(function() {
                             window.location.href="<?= base_url('administrator/login/index') ?>";
                          });
                    }
</script>
               <?php if($this->session->flashdata('alert')) { ?>
               <script type="text/javascript">
                 berhasil();
               </script>

                <?php } ?>
    </form>

    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->

<script src="<?= base_url() ?>assetsv2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assetsv2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>assetsv2/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script src="<?= base_url() ?>/assetsv2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>/assetsv2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assetsv2/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>/assetsv2/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>/assetsv2/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>/assetsv2/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>/assetsv2/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/assetsv2/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>/assetsv2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>/assetsv2/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url() ?>/assetsv2/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>/assetsv2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url() ?>/assetsv2/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>/assetsv2/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assetsv2/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/assetsv2/dist/js/demo.js"></script>
<script src="<?= base_url() ?>/assetsv2/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assetsv2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>
