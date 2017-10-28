<?php
$message='hide';
  if ($_POST) { 
    foreach($_POST AS $key => $value) { $_POST[$key] = $mysqli->real_escape_string($value); } 
    $sql = "INSERT INTO `tbl_pengguna` ( 
      `nip` ,  
      `password` ,  
      `nama_user` ,  
      `jabatan` ,  
      `level_user`  ) VALUES(  
      '{$_POST['nip']}' , 
      '{$_POST['password']}' ,  
      '{$_POST['nama_user']}' ,  
      '{$_POST['jabatan']}' ,  
      '{$_POST['level_user']}'  ) "; 
    $mysqli->query($sql) or die($mysqli->error);
    $message='show';
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
              <div class="col-sm-6">
                <input type="text" class="form-control" id="inputPassword3" placeholder="NIP" name="nip" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Nama" name="nama_user" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Jabatan</label>
              <div class="col-sm-6">
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
              <div class="col-sm-6">
                <select class="form-control" data-live-search="true" id="slct3" data-size="5" name="level_user" required>
                  <option value="wka">Wakil Kepala Sekolah</option>
                  <option value="wka">Kepala Sekolah</option>
                  <option value="wka">Persuratan</option>

                </select>
              </div>
            </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="Submit">
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