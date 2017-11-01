<?php 
$id=$_REQUEST['no_surat'];
$edit = "select * from tbl_surat_masuk where no_surat='$id'";
$hasil =  $mysqli->query($edit);
$data = $hasil->fetch_array(); 
$message = 'hide';

if(empty($level_user)){
  header("location: index.php");
}
$id=$_REQUEST['no_surat'];

if ($level_user=="kpl") {
$edit = " SELECT sm.*,ssm.* FROM tbl_surat_masuk sm LEFT JOIN tbl_status_sm ssm on ssm.no_surat=sm.no_surat where sm.no_surat = '$id' ";
}

if ($level_user=="wka") {
$edit = "SELECT sm.*,ssm.*,ds.* FROM tbl_disposisi_surat ds LEFT JOIN tbl_status_sm ssm ON ds.no_surat = ssm.no_surat LEFT JOIN tbl_surat_masuk sm on ssm.no_surat=sm.no_surat where ds.no_surat = '$id' ";
}

$hasil = $mysqli->query($edit);
$row = $hasil->fetch_array();  
?>
<section class="content-header">
  <h1>
    Surat Masuk
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="fa fa-dashboard"></i> Home</a>
    </li>
    <li>
      <a href="#">Surat Masuk</a>
    </li>
    <li class="active">Input Surat Masuk</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="alert alert-success alert-dismissible alert-message <?=$message?>">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>
              <i class="icon fa fa-check"></i> Sukses!</h4>
            Data berhasil disimpan
          </div>
          <h3 class="box-title">Input Surat Masuk</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" role="form" method="POST" action="">
          <div class="box-body">
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Kode Surat</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Kode Surat" name="kode_sm" required value="<?= stripslashes($row['kode_sm']) ?>"
                  readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Golongan Surat</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Golongan Surat" name="golongan_surat" required value="<?= stripslashes($row['golongan_surat']) ?>"
                  readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nomor Agenda</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Nomor Agenda" name="nomor_agenda" required value="<?= stripslashes($row['nomor_agenda']) ?>"
                  readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Perihal</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Perihal" name="perihal" required value="<?= stripslashes($row['perihal']) ?>"
                  readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Isi Ringkas</label>
              <div class="col-sm-7">
                <textarea class="form-control " id="inputPassword3" placeholder="Isi Ringkas" name="isi_ringkas" required rows="5" readonly><?= stripslashes($row['isi_ringkas']) ?>
                </textarea>
              </div>
            </div>
            <?php if ($level_user=="wka"): ?>


            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Instruksi</label>
              <div class="col-sm-7">
                <textarea class="form-control textarea" id="inputPassword3" placeholder="Instruksi" name="instruksi" required rows="5" readonly><?= stripslashes($row['instruksi']) ?>
                </textarea>
              </div>
            </div>

            <?php endif ?>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Asal Surat</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Asal Surat" name="asal_surat" required value="<?= stripslashes($row['asal_surat']) ?>"
                  readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Diterima</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Tanggal" autocomplete="off" name="tgl_sm" data-date-format="yyyy-mm-dd"
                  required value="<?= stripslashes($row['tgl_sm']) ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Lampiran</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Lampiran" name="lampiran" value="<?= stripslashes($row['lampiran']) ?>"
                  readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Diteruskan</label>
              <div class="col-sm-4">
                <input type="text" id="datepicker" class="form-control" placeholder="Tanggal Diteruskan" autocomplete="off" name="tgl_diteruskan" data-date-format="yyyy-mm-dd"
                  required value="<?= stripslashes($row['tgl_diteruskan']) ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">File Permohonan</label>
              <div class="col-sm-4">
                <a href="<?php echo "../file-sm/$row[nama_file] ";?>" class="btn btn-warning example1demo">File Surat</a>
              </div>
            </div>


          </div>
          <!-- /.box-body -->
          <div class="box-footer">

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <a href="?page=surat" class="btn btn-success ">Inbox Surat</a>
                    <?php  if ($level_user =="kpl") {  ?>
                    <a href= '<?php echo "?page=input_disposisit&no_surat=$row[no_surat]"; ?>' class="btn btn-primary pull-right"> Disposisi </a>
                    <?php } ?>
                    <?php  if ($level_user =="wka") {  ?>
                    <a href= '<?php echo "?page=tindak_lanjut_disposisi&no_surat=$row[no_surat]"; ?>' class="btn btn-primary pull-right"> Tindak Lanjut </a>
                    <?php } ?>
                  </div>
                </div>

          </div>
      </div>
      </form>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
</section>