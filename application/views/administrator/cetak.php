<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator | Presensi Swadharma</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assetsv2/style3.css">
 </head>
<body>

     <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-success" style="height: 170px;">
            <div class="inner">
            <!-- isi  -->
            <table class="table-1" style="margin-top: -10px;">
            <thead>
                <tr>
                    <th><center><img class="logo" src="<?= base_url('assetsv2/dist/img/stmik.jpeg')?>"></center></th>
                    <th colspan="2"><center>KARTU PRESENSI MAHASISWA<br>STMIK SWADHARMA</center></th>
                </tr>
             </thead>
             <tbody>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $mahasiswa->nama ?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?= $mahasiswa->nim ?></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>:</td>
                    <td><?= $mahasiswa->prodi ?></td>
                </tr>
                <tr>
                    <td colspan="3"><center><img width="70%" height="40px" src="<?= base_url('administrator/barcode/barcodeCard/'.$mahasiswa->nim) ?>" ></center></td>
                    <td></td>
                </tr>
               </tbody>
            </table>
            </div>
            <br>
         <div class="form-group" style="margin-left: 70px;">
         <script>
         window.print();
         </script>
        </div>
          </div>
        </div>
</body>
</html>