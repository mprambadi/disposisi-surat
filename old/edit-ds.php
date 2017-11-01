<?php 
session_start();// Starting Session
include("db.php");
$username=$_SESSION['login_user']; //Storing session
include("lv.php");

if($level!='kpl'){
  header("location: index.php");
}

$id=$_REQUEST['no_surat'];
$edit = "select * from tbl_disposisi_surat where no_surat='$id'";
$hasil =  $mysqli->query($edit);
$row = $hasil->fetch_array(); 

if (isset($_POST['editdisposisi'])) { 
$wak=$_POST['diteruskan_kpd'];
$imp=implode("-", $wak);
foreach($_POST AS $key => $value) { $_POST[$key] = $mysqli->real_escape_string($value); } 
$sql = "UPDATE `tbl_disposisi_surat` SET  
 `instruksi` =  '{$_POST['instruksi']}' ,  
 `diteruskan_kpd` =  '$imp' 
 WHERE `no_surat` = '$id' "; 

$mysqli->query($sql) or die($mysqli->error);
echo "<meta http-equiv='refresh' content='0; url=dash.php'>"; ?>

<?php }
?>

              
<?php 
include ('navbar.php');
?>
    <div style="padding-bottom:10px;"></div>    
    <div class="container">           
            <div class="tab-pane fade in panel panel-primary" >
                <div class="panel-heading">
                  Input Disposisi Surat
                </div>
                <form class="form-horizontal" style="padding:10px" method="POST" action=''>
                  <input type='hidden' name='no_surat' value='<?= $id ?>' /> 
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No Surat </label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="No Surat" value=<?php echo ($row["no_surat"]) ?> readonly name="no_surat">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Instruksi</label>
                    <div class="col-sm-7">
                      <textarea  class="form-control textarea" id="instruksi" placeholder="Instruksi" name="instruksi" required ><?= stripslashes($row['instruksi']) ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Diteruskan Kepada</label>
                    <div class="col-sm-4">
                      <select id="slct" data-live-search="true" id="kd_mahasiswa" data-size="5" multiple name="diteruskan_kpd[]">

                        <option value="Waka Sarana">Waka Sarana</option>
                        <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                        <option value="Waka Kurikulum">Waka Kurikulum</option>
                        <option value="Waka Hubin">Waka Hubin</option>

                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-success btn-sm" value="Edit" >
                      <input type='hidden' value='1' name="editdisposisi" /> 
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
    <script src="assets/js/bootstrap-select.js"></script>
    <script>
    $(document).ready(function() {
        $('.textarea').wysihtml5();
        $('#tgl_peny').datepicker();
        $('#tgl_pene').datepicker();
        $('#slct').selectpicker();

    } );
    </script>

  </body>

</html>      