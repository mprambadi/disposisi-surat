<?php 
$id=$_REQUEST['no_surat'];
$edit = "select * from tbl_surat_masuk where no_surat='$id'";
$hasil =  $mysqli->query($edit);
$data = $hasil->fetch_array(); 
$message = 'hide';

if ($_POST) { 
  $wak=$_POST['diteruskan_kpd'];
  $imp=implode("-", $wak);
  foreach($_POST AS $key => $value) { $_POST[$key] =$value; } 
    $sql = "INSERT INTO `tbl_disposisi_surat` ( 
      `no_surat` , 
      `instruksi` , 
      `diteruskan_kpd`,
      `proses`  ) 
          VALUES(
      '{$_POST['no_surat']}', 
      '{$_POST['instruksi']}' ,  
      '$imp',
      'Unact') "; 
    $sql1 = " UPDATE `tbl_status_sm` 
         SET 
      `status`='disposed' 
       where `no_surat`='$id' ";
    $mysqli->query($sql) or die($mysqli->error);
    $mysqli->query($sql1) or die($mysqli->error);
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
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">No Surat </label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="inputEmail3" placeholder="No Surat" value=<?php echo ($data[ "no_surat"]) ?> readonly name="no_surat">
              </div>
            </div>


            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Instruksi</label>
              <div class="col-sm-7">
                <textarea class="form-control textarea" id="instruksi" placeholder="Instruksi" name="instruksi" required></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Diteruskan Kepada</label>
              <div class="col-sm-4">
                <select class="form-control select2" data-live-search="true" data-size="5" multiple name="diteruskan_kpd[]">

                  <option value="Waka Sarana">Waka Sarana</option>
                  <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                  <option value="Waka Kurikulum">Waka Kurikulum</option>
                  <option value="Waka Hubin">Waka Hubin</option>

                </select>
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