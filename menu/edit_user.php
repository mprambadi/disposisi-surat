<?php
$message='hide';
if ($_REQUEST['edit'] ?? false) {
  $id=$_REQUEST['edit'];
  $edit = "select * from tbl_pengguna where nip='$id'";
  $hasil =  $mysqli->query($edit);
  $row = $hasil->fetch_array(); 
  if ($_POST) { 
    foreach($_POST AS $key => $value) { $_POST[$key] = $mysqli->real_escape_string($value); } 
    $sql = "UPDATE `tbl_pengguna` SET  
    `nama_user` =  '{$_POST['nama_user']}' ,  
    `password` =  '{$_POST['password']}' ,  
    `jabatan` =  '{$_POST['jabatan']}' ,  
    `level_user` =  '{$_POST['level_user']}'  
    WHERE `nip` = '$id' "; 
    $mysqli->query($sql) or die($mysqli->error);
    $message = 'show';
   }
  }
  
  if ($_REQUEST['del'] ?? false ) {
  $id=$_REQUEST['del'];

  $mysqli->query("DELETE FROM `tbl_pengguna` WHERE `nip` = '$id' ");
  echo "<meta http-equiv='refresh' content='0; url=./'>";
  }   
?>
<section class="content-header">
  <h1>
    User
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="fa fa-dashboard"></i> Home</a>
    </li>
    <li>
      <a href="#">User</a>
    </li>
    <li class="active">Input User</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="alert alert-success alert-dismissible alert-message <?=$message?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data berhasil disimpan
          </div>
          <h3 class="box-title">Input User</h3>

        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" role="form" method="POST" action="">
          <div class="box-body">
          <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">NIP</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="inputPassword3" placeholder="NIP" name="nip" readonly value="<?= stripslashes($row['nip']) ?>">
          </div>
        </div>
  
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="inputPassword3" placeholder="Nama" name="nama_user" required value="<?= stripslashes($row['nama_user']) ?>">
          </div>
        </div>
  
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="inputPassword3" placeholder="*********" name="password" required>
          </div>
        </div>
  
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Jabatan</label>
          <div class="col-sm-4">
            <select class="form-control" data-live-search="true" id="slct2" data-size="5" name="jabatan" required>
              <option value="Waka SDM">Waka SDM</option>
              <option value="Waka Sarana">Waka Sarana</option>
              <option value="Waka Kesiswaan">Waka Kesiswaan</option>
              <option value="Waka HUBIN">Waka HUBIN</option>
              <option value="Waka Kurikulum">Waka Kurikulum</option>
              <option value="WMM">WMM</option>
              <option value="Persuratan">Persuratan</option>
              <option value="Kepala Sekolah">Kepala Sekolah</option>
            </select>
  
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Level</label>
          <div class="col-sm-4">
            <select class="form-control" data-live-search="true" id="slct3" data-size="5" name="level_user" required>
              <option value="wka">Wakil Kepala Sekolah</option>
              <option value="wka">Kepala Sekolah</option>
              <option value="wka">Persuratan</option>
  
            </select>
  
          </div>
        </div>
  
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">

            <input type='hidden' value='1' name="edituser" />
          </div>
        </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-success pull-right" value="Edit">
              <a href="./" class="btn btn-primary "> Dashboard </a>
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