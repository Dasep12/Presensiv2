
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

      </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="form-inline">
                    <form action="<?= base_url('administrator/barcode/index') ?>" method="post">
                         <select name="nim" class="form-control select2" style="width: 65%;">
                        <option value=""> - Pilih NIM - </option>
                          <?php foreach($mhs as $item) : ?>
                            <option value="<?= $item->nim ?>"><?= $item->nim . ' - ' . $item->nama ?></option>
                          <?php endforeach ?>
                        </select>
                        <button type="submit" name="tampil" class="btn btn-primary btn-sm">Preview</button>
                    <script>
                    function bukalink(){
                        window.open('<?= base_url('administrator/barcode/print') ?>', 'height=480' , 'width=640' ,'resizeable=yes')
                    }
                    </script>
                        <a href="javascript:bukalink()" class="btn btn-danger btn-sm">Cetak Semua</a>
                    </form>
                        <?= form_error('nim','<div class="text-danger small">','</div>') ?>
                 </div>
             </div>

             <?php if (isset($_POST['tampil'])) { 
                if (!empty($_POST['nim'])) { ?>
     <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box-3">
            <div class="inner">
            <!-- isi  -->
            <table class="table-1">
                <tr>
                    <th><center><img class="logo" src="<?= base_url('assetsv2/dist/img/stmik.jpeg')?>"></center></th>
                    <th colspan="2"><center>KARTU PRESENSI MAHASISWA<br>STMIK SWADHARMA</center></th>
                </tr>
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
            </table>
            </div>
            <br>
         <div class="form-group" style="margin-left: 70px;">
         <script>
            function buka(){

             window.open('<?= base_url('administrator/barcode/cetak/'.$mahasiswa->nim) ?>', 'height=480' , 'width=640' ,'resizeable=yes')
            }
         </script>
            <a href="javascript:buka()" class="btn btn-success" ><i class="fa fa-print"></i> Cetak</a>
        </div>
          </div>
        </div>

             <?php }else{ ?>

             <?php } } ?>

        </div>

    <!-- /.content -->

