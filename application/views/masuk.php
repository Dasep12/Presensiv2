<!DOCTYPE html>
<html>
    
    <head>
        <title>Presensi Swadharma</title>
        <!-- Bootstrap -->
        <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?= base_url() ?>assets/assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fontawesome-free-5.0.2/web-fonts-with-css/font-awesome/fontawesome-all.css">
        <script defer src="<?= base_url() ?>assets/fontawesome-free-5.0.2/svg-with-js/js/fontawesome-all.min.js"></script>
    </head>
<script type="text/javascript">
  // 1 detik = 1000
  windows.setTimeout("waktu()",10000);
  function waktu(){
    var tanggal = new Date();
    setTimeout("waktu()",1000);
    document.getElementById('output').innerHTML =tanggal.getHours()+":" +tanggal.getMinutes()+":"+tanggal.getSeconds();
  }
</script>    
    <body onload="waktu()">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>

                    <a class="brand">
                    </a>

                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                          <!--   <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Vincent Gabriel <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="login.html">Logout</a>
                                    </li>
                                </ul>
                            </li> -->
                        </ul>
                        <ul class="nav">
                          
                            
                          
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                 <form action="<?= base_url('masuk/absen2') ?>" method="post">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                   
                        <li>
                            <a ><img src="<?= base_url() ?>assets/img/jam (1).jpg" height="150px" width="200px"></a>                  
                        </li>
                        <li>
                            <input autocomplete="off" placeholder="Masukan NIM" name="nim" autofocus="on" type="text" class="form form-control" style="width: 80%;margin-left: 20px;margin-top: 12px;">
                            <?= form_error('nim','<center><p style="color: red">','</p></center>') ?>
                            <?php if($this->session->flashdata('pesan')) : ?>
                                <div class="text-danger small" style="color:red;"><center><?= $this->session->flashdata('pesan') ?></center></div>
                            <?php endif; ?>
                        </li>
                        <li>
                            <a><input required="" autocomplete="off" style="width: 100%" type="submit" class="btn btn-danger" name="simpan" value="Absen"></a>
                        </li>
                    </form>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">

                <input type="hidden" value="<?= date('h:i:s') ?>">
                     <!-- validation -->
                    <div class="row-fluid">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="pull-left "><span  class="active"><?= $hari.',' ?></span></div>
                                <div style="margin-left: 5px;" class="pull-left ml-3"><span class="ml-3" href=""><?= date('d') ?> <?= $bulan . date(' Y  / ') ?>   </span>
                                <span id="output"></span>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
          <!-- BEGIN FORM-->
          <form action="#" id="form_sample_1" class="form-horizontal">
            <fieldset>
                <center>
                <div>
                <h2><img style="height: 120px" src="<?= base_url('assets/img/stmik.jpg') ?>">Presensi Mahasiswa Swadharma </h2>
                
                </div>
                </center>
                <hr>

           <?php if($this->session->flashdata('alert')) : ?>
            <script>
              alert('Anda Sudah Absen')
            </script>
        <?php endif ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Masuk</th>
                            <th>Pulang</th>
                            <th>Keterangan</th>
                        </tr>
                        <tbody>
                        <?php if (!empty($mahasiswa->nim)) { ?>
                            <tr>
                                <td><?= $mahasiswa->tanggal ?></td>
                                <td><?= $mahasiswa->nama ?></td>
                                <td><?= $mahasiswa->prodi ?></td>
                                <td><?= $mahasiswa->masuk ?></td>
                                <td><?= $mahasiswa->pulang ?></td>
                                <td>
                                    <?php if(empty($mahasiswa->pulang) && empty($mahasiswa->masuk)){
                                        echo "<center>-</center>";
                                    }elseif(!empty($mahasiswa->pulang) && (!empty($mahasiswa->masuk))){
                                        echo "Hadir";
                                    }elseif(!empty($mahasiswa->masuk) && empty($mahasiswa->pulang)){
                                        echo "Belum Absen Pulang";
                                    }elseif(!empty($mahasiswa->pulang) && empty($mahasiswa->masuk)){
                                        echo "Lupa Absen Masuk";
                                    }

                                    ?>
                                </td>
                            </tr>
                       <?php } elseif(empty($mahasiswa->nim)){ ?>
                        
                        <tr>
                            <td colspan="6" style="text-align:center;"><h3>Tidak Ada Data</h3></td>
                        </tr>

                        <?php } ?>

                        </tbody>
                    </thead>
                </table>

            </fieldset>
        </div>
          </div>
      </div>
                      <!-- /block -->
        </div>
                     <!-- /validation -->


                </div>
            </div>
            <hr>
            <footer>
               <!--  <p>&copy; Copyright PT.INDOMARCO PRISMATAMA 2019</p> -->
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="<?= base_url() ?>assets/vendors/jquery-1.9.1.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/scripts.js"></script>
        <script>

  jQuery(document).ready(function() {   
     FormValidation.init();
  });
  

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>
<!--    //End of file
    //Folder Location : application/view/Masuk.php -->