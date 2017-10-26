<?php 
session_start();// Starting Session
include("db.php");
$username=$_SESSION['login_user']; //Storing session
include("lv.php");

if($level!='akr'){
  header("location: index.php");
}
if ($_REQUEST['edit']) {
$id=$_REQUEST['edit'];
$edit = "select * from tbl_pengguna where nip='$id'";
$hasil =  $mysqli->query($edit);
$row = $hasil->fetch_array(); 

if (isset($_POST['edituser'])) { 
$pass=md5($_POST['password']);
foreach($_POST AS $key => $value) { $_POST[$key] = $mysqli->real_escape_string($value); } 
$sql = "UPDATE `tbl_pengguna` SET  
 `nama_user` =  '{$_POST['nama_user']}' ,  
 `password` =  '$pass' ,  
 `jabatan` =  '{$_POST['jabatan']}' ,  
 `level_user` =  '{$_POST['level_user']}'  

 WHERE `nip` = '$id' "; 

$mysqli->query($sql) or die(mysql_error());
echo "<meta http-equiv='refresh' content='0; url=dash.php'>";

}
}

if ($_REQUEST['del']) {
$id=$_REQUEST['del'];
$mysqli->query("DELETE FROM `tbl_pengguna` WHERE `nip` = '$id' ") ;
echo "<meta http-equiv='refresh' content='0; url=dash.php'>";
}              
include ('navbar.php');
?>
<div style="padding-bottom:10px;"></div>
<div class="container">

  <div class="tab-pane fade in panel panel-primary">
    <div class="panel-heading">
      Edit User
    </div>
    <form class="form-horizontal" role="form" style="padding:10px" method="POST" action="" enctype="multipart/form-data">


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
          <input type="submit" class="btn btn-success" value="Edit">
          <a href="dash.php" class="btn btn-primary "> Dashboard </a>
          <input type='hidden' value='1' name="edituser" />
        </div>
      </div>
    </form>

  </div>
</div>
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="assets/js/bootstrap3-wysihtml5.js" type="text/javascript"></script>
<script src="assets/js/docs.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.dataTables.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    $('#slct2').selectpicker();
    $('#slct3').selectpicker();

  });
</script>

</body>

</html>