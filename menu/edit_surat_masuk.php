<?php 

 
$message = 'hide';
$id=$_REQUEST['no_surat'];
$edit = "select * from tbl_surat_masuk where no_surat='$id'";
$hasil =  $mysqli->query($edit);
$row = $hasil->fetch_array(); 

if ($_POST) { 
foreach($_POST AS $key => $value) { $_POST[$key] = $mysqli->real_escape_string($value); } 
$sql = "UPDATE `tbl_surat_masuk` SET  
`kode_sm` =  '{$_POST['kode_sm']}' ,
`nomor_agenda` =  '{$_POST['nomor_agenda']}' ,
`perihal` =  '{$_POST['perihal']}' , 
`isi_ringkas` =  '{$_POST['isi_ringkas']}' , 
`asal_surat` =  '{$_POST['asal_surat']}' ,  
`tgl_sm` =  '{$_POST['tgl_sm']}' ,  
`lampiran` =  '{$_POST['lampiran']}' ,  
`tgl_diteruskan` =  '{$_POST['tgl_diteruskan']}' , 
`golongan_surat` =  '{$_POST['golongan_surat']}' 
 WHERE `no_surat` = $id "; 

$mysqli->query($sql) or die($mysqli->error); 
$message = 'show';
}
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
          <input type='hidden' name='no_surat' value='<?= $id ?>' /> 
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Kode Surat</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Kode Surat" name="kode_sm" required value="<?= stripslashes($row['kode_sm']) ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Golongan Surat</label>
            <div class="col-sm-4">
              <select class="form-control" data-live-search="true" id="slct" data-size="5" name="golongan_surat" required>
                <option value="Biasa">Biasa</option>    
                <option value="Penting">Penting</option>                  
                <option value="Rahasia">Rahasia</option>
                <option value="Sangat Rahasia">Sangat Rahasia</option>

              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nomor Agenda</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Nomor Agenda" name="nomor_agenda" required value="<?= stripslashes($row['nomor_agenda']) ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Perihal</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Perihal" name="perihal" required value="<?= stripslashes($row['perihal']) ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Isi Ringkas</label>
            <div class="col-sm-7">
              <textarea  class="form-control textarea" id="inputPassword3" placeholder="Isi Ringkas" name="isi_ringkas" required rows="5"><?= stripslashes($row['isi_ringkas']) ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Asal Surat</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Asal Surat" name="asal_surat" required value="<?= stripslashes($row['asal_surat']) ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Diterima</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="datepicker" placeholder="Tanggal" autocomplete="off" name="tgl_sm" data-date-format="yyyy-mm-dd" required value="<?= stripslashes($row['tgl_sm']) ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Lampiran</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Lampiran" name="lampiran" value="<?= stripslashes($row['lampiran']) ?>">
            </div>
          </div>





          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Diteruskan</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="datepicker2" placeholder="Tanggal Diteruskan" autocomplete="off" name="tgl_diteruskan" data-date-format="yyyy-mm-dd" required value="<?= stripslashes($row['tgl_diteruskan']) ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">File Permohonan</label>
            <div class="col-sm-4">
              <input type="file" class="form-control" id="inputPassword3" placeholder="Password" value="<?= stripslashes($row['perihal']) ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Pegolah</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Pengolah" value="<?= stripslashes($row['pengolah']) ?>" readonly name="pengolah" >
            </div>
          </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <a href="dash.php" class="btn btn-success">Inbox Surat</a>
              </div>
            </div>
          </div>
      </div>
      </form>
    </div>
    <!-- /.box -->
  </div>

</section>