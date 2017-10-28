<?php 
session_start();// Starting Session
include("db.php");
$username=$_SESSION['login_user']; //Storing session
include("lv.php");

if($level!='wka'){
  header("location: index.php");
}

$hari= date('Y-m-d');
$id=$_REQUEST['no_surat'];
$edit = "SELECT sm. * , ssm. * , ds. *
FROM tbl_disposisi_surat ds
LEFT JOIN tbl_status_sm ssm ON ds.no_surat = ssm.no_surat
LEFT JOIN tbl_surat_masuk sm ON ssm.no_surat = sm.no_surat
WHERE ds.no_surat = '$id' ";
$hasil =  $mysqli->query($edit);
$data = $hasil->fetch_array(); 

if (isset($_POST['tindakan'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = $mysqli->real_escape_string($value); } 
$sql = "UPDATE `tbl_disposisi_surat` SET  
 `tanggal_penyelesaian` =  '{$_POST['tanggal_penyelesaian']}' ,  
 `proses` =  '{$_POST['proses']}' WHERE `no_surat` = '$id' "; ; 

$mysqli->query($sql) or die($mysqli->error);
echo "<meta http-equiv='refresh' content='0; url=dash.php'>"; 

}
?>

<?php 
include ('navbar.php');
?>
    <div style="padding-bottom:10px;"></div>    
    <div class="container">           
            <div class="tab-pane fade in panel panel-primary" >
                <div class="panel-heading">
                  Tindak Lanjut Disposisi Surat
                </div>
                <form class="form-horizontal" style="padding:10px" method="POST" action=''>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tgl Penyelesaian </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="tgl_peny" placeholder="Tanggal Penyelesaian"  name="tanggal_penyelesaian" required data-date-format="yyyy-mm-dd" required value="<?php echo ($hari) ?>">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tindakan</label>
                    <div class="col-sm-7">
                      <textarea  class="form-control textarea" id="proses" placeholder="Tindakan" name="proses" required></textarea>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-success btn-sm" value="Input" >
                      <input type='hidden' value='1' name="tindakan" /> 
                      <a href="dash.php" class="btn btn-primary btn-sm">Inbox Surat</a>
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
    <script>
    $(document).ready(function() {
        $('.textarea').wysihtml5();
        $('#tgl_peny').datepicker();
        $('#tgl_pene').datepicker();

    } );
    </script>
    <script>
    
    </script>
  </body>

</html>      