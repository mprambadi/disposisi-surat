<?php 
session_start();// Starting Session

$username=$_SESSION['login_user']; //Storing session.
include("db.php");
include("lv.php");

if(empty($level)){
  header("location: index.php");
}
$id=$_REQUEST['no_surat'];

if ($level=="kpl") {


$edit = " SELECT sm.*,ssm.* FROM tbl_surat_masuk sm
                  LEFT JOIN tbl_status_sm ssm on ssm.no_surat=sm.no_surat where sm.no_surat = '$id' ";

}


if ($level=="wka") {
$edit = " SELECT sm.*,ssm.*,ds.* FROM tbl_disposisi_surat ds
                  LEFT JOIN tbl_status_sm ssm ON ds.no_surat = ssm.no_surat
                  LEFT JOIN tbl_surat_masuk sm on ssm.no_surat=sm.no_surat  where ds.no_surat = '$id' ";
 
}

$hasil =  $mysqli->query($edit);
$row = $hasil->fetch_array();  
?>
             

<?php 
include 'navbar.php';
?>
    <div style="padding-bottom:10px;"></div>    
    <div class="container">           
            <div class="tab-pane fade in panel panel-primary" >
                <div class="panel-heading">
                  Detail Surat Masuk
                </div>
                <form class="form-horizontal" role="form" style="padding:10px" method="POST" action="">


                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Kode Surat</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Kode Surat" name="kode_sm" required value="<?= stripslashes($row['kode_sm']) ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Golongan Surat</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Golongan Surat" name="golongan_surat" required value="<?= stripslashes($row['golongan_surat']) ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Nomor Agenda</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Nomor Agenda" name="nomor_agenda" required value="<?= stripslashes($row['nomor_agenda']) ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Perihal</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Perihal" name="perihal" required value="<?= stripslashes($row['perihal']) ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Isi Ringkas</label>
                    <div class="col-sm-7">
                      <textarea  class="form-control " id="inputPassword3" placeholder="Isi Ringkas" name="isi_ringkas" required rows="5" readonly><?= stripslashes($row['isi_ringkas']) ?></textarea>
                    </div>
                  </div>
                  <?php if ($level=="wka"): ?>
                    
                  
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Instruksi</label>
                    <div class="col-sm-7">
                      <textarea  class="form-control" id="inputPassword3" placeholder="Instruksi" name="instruksi" required rows="5" readonly><?= stripslashes($row['instruksi']) ?></textarea>
                    </div>
                  </div>

                  <?php endif ?>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Asal Surat</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Asal Surat" name="asal_surat" required value="<?= stripslashes($row['asal_surat']) ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Diterima</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="Tanggal" autocomplete="off" name="tgl_sm" data-date-format="yyyy-mm-dd" required value="<?= stripslashes($row['tgl_sm']) ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Lampiran</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="Lampiran" name="lampiran" value="<?= stripslashes($row['lampiran']) ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Diteruskan</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="Tanggal Diteruskan" autocomplete="off" name="tgl_diteruskan" data-date-format="yyyy-mm-dd" required value="<?= stripslashes($row['tgl_diteruskan']) ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">File Permohonan</label>
                    <div class="col-sm-4">
                       <a href="<?php echo "file-sm/$row[nama_file]";?>" class="btn btn-warning example1demo" >File Surat</a>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <a href="dash.php" class="btn btn-success ">Inbox Surat</a> 
                      <?php  if ($level=="kpl") {  ?>
                      <a href= <?php echo "ds.php?no_surat=$row[no_surat]"; ?> class="btn btn-primary "> Disposisi </a>
                      <?php } ?>
                      <?php  if ($level=="wka") {  ?>
                      <a href= <?php echo "tl-ds.php?no_surat=$row[no_surat]"; ?> class="btn btn-primary "> Tindak Lanjut </a>
                      <?php } ?>
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
    <script src="assets/js/popup.js"></script>
    <script>
    $(document).ready(function() {
        $('.textarea').wysihtml5();
        $('#tgl').datepicker();
        $('#tgl_terus').datepicker();
        $('#slct').selectpicker();
        $('.example1demo').popupWindow({ 
      height:500, 
      width:800, 
      top:50, 
      left:50 
      }); 

    } );
    </script>

  </body>

</html>      