<?php 
if($level_user!='wka'){
  header("location: index.php");
}

$message = 'hide';
$hari= date('Y-m-d');
$id=$_REQUEST['no_surat'];
$edit = "SELECT sm. * , ssm. * , ds. *
FROM tbl_disposisi_surat ds
LEFT JOIN tbl_status_sm ssm ON ds.no_surat = ssm.no_surat
LEFT JOIN tbl_surat_masuk sm ON ssm.no_surat = sm.no_surat
WHERE ds.no_surat = '$id' ";
$hasil =  $mysqli->query($edit);
$data = $hasil->fetch_array(); 

if ($_POST) { 
foreach($_POST AS $key => $value) { $_POST[$key] = $mysqli->real_escape_string($value); } 
$sql = "UPDATE `tbl_disposisi_surat` SET  
 `tanggal_penyelesaian` =  '{$_POST['tanggal_penyelesaian']}' ,  
 `proses` =  '{$_POST['proses']}' WHERE `no_surat` = '$id' "; ; 

$mysqli->query($sql) or die($mysqli->error);
$message = 'show';

}
?>
<section class="content-header">
  <h1>
    Disposisi
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="fa fa-dashboard"></i> Home</a>
    </li>
    <li>
      <a href="#">Disposisi</a>
    </li>
    <li class="active">Tindak Lanjut Disposisi Surat</li>
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
          <h3 class="box-title">Tindak Lanjut Disposisi Surat</h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" role="form" method="POST" action="">
          <div class="box-body">

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Tgl Penyelesaian </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="datepicker" placeholder="Tanggal Penyelesaian" name="tanggal_penyelesaian" required
                  data-date-format="yyyy-mm-dd" required value="<?php echo ($hari) ?>">
              </div>
            </div>


            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Tindakan</label>
              <div class="col-sm-7">
                <textarea class="form-control textarea" id="proses" placeholder="Tindakan" name="proses" required></textarea>
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
  <!-- /.col -->
  </div>
  <!-- /.row -->
</section>