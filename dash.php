<?php
  session_start();// Starting Session
  include("db.php");
  $username=$_SESSION['login_user']; //Storing session
  include("lv.php");
  if(empty($level_user)){
  header("location: index.php");
  }
  $query = $mysqli->query("select no_surat from tbl_surat_masuk ");

  $hari= date('Y-m-d');
  if (isset($_POST['inputsurat'])) { 
    $lokasi_file=$_FILES[nama_file][tmp_name];
    $nama_file=$_FILES[nama_file][name];
    $tipe = explode(".",$nama_file);
    $nn=mt_rand(1,100);
    $nama_baru = $nn."_".$tipe[0].".".$tipe[1];
    move_uploaded_file($lokasi_file,"file-sm/$nama_baru");
      foreach($_POST AS $key => $value) { $_POST[$key] = $mysqli->real_escape_string($value); } 
      $sql = "INSERT INTO `tbl_surat_masuk` (
        `kode_sm` ,
        `nomor_agenda` ,
        `perihal` ,
        `isi_ringkas` , 
        `asal_surat` ,
        `tgl_sm` ,
        `lampiran` ,
        `tgl_diteruskan` ,
        `nama_file` ,
        `golongan_surat` ,
        `pengolah` 
)
            VALUES(
        '{$_POST['kode_sm']}' ,
        '{$_POST['nomor_agenda']}' ,  
        '{$_POST['perihal']}' ,  
        '{$_POST['isi_ringkas']}' ,  
        '{$_POST['asal_surat']}' ,  
        '{$_POST['tgl_sm']}' ,  
        '{$_POST['lampiran']}' ,  
        '{$_POST['tgl_diteruskan']}', 
        '$nama_baru',  
        '{$_POST['golongan_surat']}' ,   
        '{$_POST['pengolah']}'
         ) "; 

      $sql1 = "INSERT INTO `tbl_status_sm` (
        `no_surat`,
        `tujuan`,
        `status`) 
            VALUES (
        LAST_INSERT_ID(),
        'Kepala Sekolah',
        'undisposed')";

      $mysqli->query($sql) or die($mysqli->error);
      $mysqli->query($sql1) or die($mysqli->error);
      header("location: dash.php"); 

    }



    if (isset($_POST['inputuser'])) { 
    $pass=MD5($_POST['password']);
    foreach($_POST AS $key => $value) { $_POST[$key] = $mysqli->real_escape_string($value); } 
    $sql = "INSERT INTO `tbl_pengguna` ( 
      `nip` ,  
      `password` ,  
      `nama_user` ,  
      `jabatan` ,  
      `level_user`  ) VALUES(  
      '{$_POST['nip']}' , 
      '$pass' ,
      '{$_POST['nama_user']}' ,  
      '{$_POST['jabatan']}' ,  
      '{$_POST['level_user']}'  ) "; 
    $mysqli->query($sql) or die($mysqli->error);
    header("location: dash.php");
    } 

    include 'navbar.php';
?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar ">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-edit">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-edit ">
          <ul class="nav nav-sidebar">


            <?php if ($level=="pst") { ?>
            <hr class="alert-success">
            <li>
              <a href="#is" data-toggle="tab">Input Surat Masuk</a>
            </li>
            
            <hr class="alert-danger">

            <li>
              <a href="#usr" data-toggle="tab">Input User</a>
            </li>
            <li>
              <a href="#use" data-toggle="tab">Rekap User</a>
            </li>
            <hr class="alert-danger">
            <li>
              <a href="#rks" data-toggle="tab">Rekap Surat Masuk
                <?php $res=$mysqli->query("SELECT count(no_surat) as status FROM `tbl_surat_masuk` "); 
                          $row = $res->fetch_assoc();
                          $inboxsurat=$row['status'];
                          ?>
                <span class="badge">
                  <?php echo ($inboxsurat) ?>
                </span>
              </a>
              </a>
            </li>


            <?php }?>

            <?php  if ($level=="kpl") {  ?>
            <hr class="alert-success">
            <li>
              <a href="#ibs" data-toggle="tab">Inbox Surat
                <?php $res=$mysqli->query("SELECT count(status) as status FROM `tbl_status_sm` WHERE status ='undisposed'"); 
                          $row = $res->fetch_assoc();
                          $inboxsurat=$row['status'];
                          ?>
                <span class="badge">
                  <?php echo ($inboxsurat) ?>
                </span>
              </a>
            </li>
            <!-- <li><a href="#ids"  data-toggle="tab">Input Disposisi Surat</a></li> -->
            <hr class="alert-danger">

            <?php }?>

            <?php  if ($level=="wka") {  ?>
            <hr class="alert-success">
            <li>
              <a href="#ibd" data-toggle="tab">Inbox Disposisi
                <?php $res=$mysqli->query("SELECT count(status) as status FROM `tbl_status_sm` s LEFT JOIN tbl_disposisi_surat ds on ds.no_surat=s.no_surat WHERE diteruskan_kpd LIKE '%$jabatan%' and ds.proses='unact' ");
                          $row = $res->fetch_assoc();
                          $inboxsurat=$row['status'];
                          ?>
                <span class="badge">
                  <?php echo ($inboxsurat) ?>
                </span>
              </a>
            </li>
            <hr class="alert-danger">

            <?php }?>

            <?php if ($level=="akr") { ?>
            <hr class="alert-success">
            <li>
              <a href="#usr" data-toggle="tab">Input User</a>
            </li>
            <li>
              <a href="#use" data-toggle="tab">Rekap User</a>
            </li>
            <hr class="alert-danger">
            <?php }?>

            <li>
              <a href="#rds" data-toggle="tab">Rekap Disposisi Surat
                <?php 
                          if ($level=="kpl") {
                          $res= $mysqli->query("SELECT count(status) as status FROM `tbl_status_sm` WHERE status ='disposed'");
                          }

                          if ($level=="wka"){
                            $res= $mysqli->query(" SELECT count(no_surat) as status FROM  tbl_disposisi_surat ds WHERE diteruskan_kpd LIKE '%$jabatan%'");
                          } 
                          $row =$res->fetch_assoc();
                          $inboxsurat=$row['status'];
                          ?>

              </a>
            </li>
            <hr class="alert-success">

            <!-- <li><a href="#home"  data-toggle="tab">Another nav item</a></li> -->
          </ul>
        </div>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade in active ">
            <div class="alert alert-success fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              Selamat Datang
              <strong>
                <?php echo($nama)?> </strong> Anda Masuk Sebagai
              <strong>
                <?php echo ($jabatan) ?> </strong>
            </div>
            <?php 

                          $res=$mysqli->query("SELECT count(no_surat) as status FROM `tbl_surat_masuk` "); 
                          $row = $res->fetch_assoc();
                          $inboxsurat=$row['status'];

                          $res2=$mysqli->query("SELECT count(status) as status FROM `tbl_status_sm` WHERE status ='undisposed'");
                          $row2 = $res2->fetch_assoc();
                          $inboxsurat2=$row2['status'];

                          $res3=$mysqli->query("SELECT count(status) as status FROM `tbl_status_sm` WHERE status ='disposed'");
                          $row3 = $res3->fetch_assoc();
                          $inboxsurat3=$row3['status'];
                          ?>
            <form id="sheet2">
              <input data-cell="A1" value="<?php echo($inboxsurat); ?>" type="hidden">
              <input data-cell="B1" value="Unidisposed" type="hidden">
              <input data-cell="C1" value="Disposed" type="hidden">

              <input data-cell="A2" value="<?php echo($inboxsurat); ?>" type="hidden">
              <input data-cell="B2" value="<?php echo($inboxsurat2); ?>" type="hidden">
              <input data-cell="C2" value="<?php echo($inboxsurat3); ?>" type="hidden">

              <div style="float:left;">
                <div> Grafik Data Surat Masuk</div>
                <div data-formula="GRAPH(B2:C2, ['type=donut', 'legend=B1:C1'])" style="width:300px; height:300px;"></div>
              </div>
              <div>
                Jumlah Surat Masuk =
                <?php echo($inboxsurat); ?>
                <br> Jumlah Surat Belum di Disposisi =
                <?php echo($inboxsurat2); ?>
                <br> Jumlah Surat Sudah di Disposisi =
                <?php echo($inboxsurat3); ?>
                <br>
              </div>
            </form>
          </div>
          <div class="tab-pane fade in panel panel-primary" id="is">
            <div class="panel-heading">
              Input Surat Masuk
            </div>
            <form class="form-horizontal" role="form" style="padding:10px" method="POST" action="" enctype="multipart/form-data">


              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Kode Surat</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Kode Surat" name="kode_sm" required>
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
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Nomor Agenda" name="nomor_agenda" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Perihal</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Perihal" name="perihal" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Isi Ringkas</label>
                <div class="col-sm-7">
                  <textarea class="form-control textarea" id="inputPassword3" placeholder="Isi Ringkas" name="isi_ringkas" required></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Asal Surat</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Asal Surat" name="asal_surat" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Diterima</label>
                <div class="col-sm-4">

                  <input type="text" class="form-control" id="tgl" placeholder="Tanggal" autocomplete="off" name="tgl_sm" data-date-format="yyyy-mm-dd"
                    required value="<?php echo ($hari) ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Lampiran</label>
                <div class="col-sm-4 ">

                  <input type="text" class="form-control" id="inputPassword3" placeholder="Jumlah Lembar" name="lampiran">

                </div>
              </div>


              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Diteruskan</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="tgl_terus" placeholder="Tanggal Diteruskan" autocomplete="off" name="tgl_diteruskan"
                    data-date-format="yyyy-mm-dd" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">File Surat Masuk</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control" id="inputPassword3" placeholder="Password" name="nama_file">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Pegolah</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Pengolah" value="<?php echo ($nama) ?>" readonly
                    name="pengolah">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-default" value="Input">
                  <input type='hidden' value='1' name="inputsurat" />
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade in panel panel-primary" id="ids">
            <div class="panel-heading">
              Input Disposisi Surat
            </div>
            <form class="form-horizontal" role="form" style="padding:10px">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">No Surat</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputEmail3" placeholder="No Surat">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Tgl Penyelesaian</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Tanggal Penyelesaian">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Tgl Penerimaan</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Tanggal Penerimaan">
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Instruksi</label>
                <div class="col-sm-7">
                  <textarea class="form-control textarea" id="inputPassword3" placeholder="Instruksi"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Diteruskan Kepada</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Diteruskan Kepada">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Input</button>
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane fade  panel panel-primary " id="eds">
            <div class="panel-heading tooltip-test">
              Edit Disposisi Surat
            </div>
            <form class="form-horizontal" role="form" style="padding:10px">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Sign in</button>
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane fade  panel panel-primary " id="rks">
            <div class="panel-heading tooltip-test">
              Rekap Surat Masuk
            </div>
            <div style="padding-bottom:10px;"></div>
            <div class="table-responsive">
              <table id="trks" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Agenda</th>
                    <th>Perihal</th>
                    <th>Isi Ringkas</th>
                    <th>Asal Surat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $no = 1;
                    $query = $mysqli->query("SELECT * FROM tbl_surat_masuk sm LEFT JOIN tbl_status_sm ssm ON sm.`no_surat` = ssm.`no_surat` ORDER BY sm.no_surat ASC");
                    while($data = $query->fetch_array()){ ?>
                    <tr>
                      <td>
                        <?php echo ($no) ?>
                      </td>
                      <td>
                        <?php echo ($data["nomor_agenda"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["perihal"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["isi_ringkas"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["asal_surat"]) ?>
                      </td>


                      <?php 

                          if ($data["status"]=="disposed"){
                            $warna = "bg-primary";
                          }
                          else {
                            $warna = "bg-danger";
                          }
                          ?>


                      <td>
                        <p class="<?php echo ($warna) ?> text-center">
                          <?php echo ($data["status"]) ?> </p>
                      </td>


                      <td>
                        <a href=< ?php echo "edit-sm.php?no_surat=$data[no_surat]"; ?> class="btn btn-success btn-sm btn-block">edit</a>
                        <!-- <a href="" class="btn btn-danger btn-sm">delete</a>  -->
                      </td>
                    </tr>
                    <?php $no++;
                    }
                    ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane fade  panel panel-primary " id="rds">
            <div class="panel-heading tooltip-test">
              Rekap Disposisi Surat
            </div>
            <div style="padding-bottom:10px;"></div>
            <div class="table-responsive">
              <table id="trds" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Agenda</th>
                    <th>Perihal</th>
                    <th>Tgl Penyelesaian</th>
                    <th>Instruksi</th>
                    <th>Diteruskan Kepada</th>
                    <th>Tindak Lanjut</th>

                    <?php if ($level=="kpl") { ?>
                    <th>Aksi</th>
                    <?php }?>

                  </tr>
                </thead>

                <tbody>
                  <?php
                      $no = 1;
                      $query = $mysqli->query("SELECT sm.*,ssm.*,ds.* FROM tbl_disposisi_surat ds
                      LEFT JOIN tbl_status_sm ssm ON ds.no_surat = ssm.no_surat
                      LEFT JOIN tbl_surat_masuk sm on ssm.no_surat=sm.no_surat  ORDER BY tanggal_penyelesaian");
                      while($data = $query->fetch_array()){ ?>
                    <tr>
                      <td>
                        <?php echo ($no)?>
                      </td>
                      <td>
                        <?php echo ($data["nomor_agenda"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["perihal"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["tanggal_penyelesaian"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["instruksi"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["diteruskan_kpd"]) ?>
                      </td>

                      <?php 

                            if ($data["proses"]=="Unact"){
                              $warna = "text-danger";
                            }
                            else {
                              $warna = "text-primary";
                            }
                            ?>
                      <td>
                        <p class="<?php echo $warna;?>">
                          <?php echo ($data["proses"]) ?>
                        </p>
                      </td>
                      <?php if ($level=="kpl") { ?>
                      <td>
                        <a href=<?php echo "edit-ds.php?no_surat=$data[no_surat]"; ?> class="btn btn-success btn-sm btn-block">edit</a>
                        <!-- <a href="" class="btn btn-danger btn-sm">delete</a>  -->
                      </td>
                      <?php }?>
                    </tr>
                    <?php $no++;
                      }
                      ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane panel panel-primary" id="ibs">
            <div class="panel-heading tooltip-test">
              Inbox Surat Masuk
            </div>
            <div style="padding-bottom:10px;"></div>
            <div class="table-responsive">
              <table id="tibs" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Agenda</th>
                    <th>Perihal</th>
                    <th>Isi Ringkas</th>
                    <th>Asal Surat</th>
                    <th>Golongan Surat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                      $no = 1;
                      $query = $mysqli->query("SELECT * FROM tbl_surat_masuk LEFT JOIN tbl_status_sm ON tbl_surat_masuk.`no_surat` = tbl_status_sm.`no_surat`where tbl_status_sm.`status` = 'undisposed'  ORDER BY tbl_surat_masuk.`tgl_sm` DESC ");
                      while($data = $query->fetch_array()){ ?>
                    <tr>
                      <td width="2%">
                        <?php echo ($no) ?> </td>
                      <td>
                        <?php echo ($data["nomor_agenda"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["perihal"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["isi_ringkas"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["asal_surat"]) ?>
                      </td>

                      <?php if ($data["golongan_surat"]=="Biasa"){
                              $warna = "bg-primary";
                            }
                            else if ($data["golongan_surat"]=="Penting") {
                              $warna = "bg-success";
                            }
                            else if ($data["golongan_surat"]=="Rahasia") {
                              $warna = "bg-warning";
                            } 
                            else {
                              $warna ="bg-danger";
                            }

                            ?>
                      <td>
                        <p class="<?php echo ($warna) ?> text-center">
                          <?php echo ($data["golongan_surat"]) ?> </p>
                      </td>


                      <td>
                        <a href= <?php echo "detail-ds.php?no_surat=$data[no_surat]"; ?> class="btn btn-success btn-sm"> detail </a>
                        <a href= <?php echo "ds.php?no_surat=$data[no_surat]"; ?> class="btn btn-primary btn-sm"> disposisi </a>

                      </td>
                    </tr>
                    <?php $no++;
                      }
                      ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade in panel panel-primary" id="usr">
            <div class="panel-heading">
              Input User
            </div>
            <form class="form-horizontal" role="form" style="padding:10px" method="POST" action="" enctype="multipart/form-data">


              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">NIP</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="NIP" name="nip" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Nama" name="nama_user" required>
                </div>
              </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
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
                  <input type="submit" class="btn btn-default" value="Input">
                  <input type='hidden' value='1' name="inputuser" />
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane fade  panel panel-primary " id="ibd">
            <div class="panel-heading tooltip-test">
              Inbox Disposisi Surat
            </div>
            <div style="padding-bottom:10px;"></div>
            <div class="table-responsive">
              <table id="tibd" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Agenda</th>
                    <th>Perihal</th>
                    <th>Isi Ringkas</th>
                    <th>Dari</th>
                    <th>Instruksi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                      $no = 1;
                      $query = $mysqli->query("SELECT sm.*,ssm.*,ds.* FROM tbl_disposisi_surat ds
                      LEFT JOIN tbl_status_sm ssm ON ds.no_surat = ssm.no_surat
                      LEFT JOIN tbl_surat_masuk sm on ssm.no_surat=sm.no_surat where ds.diteruskan_kpd LIKE '%$jabatan%' and ds.proses='unact'");
                      while($data = $query->fetch_array()){
                        ?>
                    <tr>
                      <td>
                        <?php echo ($no) ?>
                      </td>
                      <td>
                        <?php echo ($data["nomor_agenda"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["perihal"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["isi_ringkas"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["asal_surat"]) ?>
                      </td>
                      <td>
                        <?php echo ($data["instruksi"]) ?>
                      </td>
                      <td>
                        <a href=< ?php echo "detail-ds.php?no_surat=$data[no_surat]"; ?> class="btn btn-success btn-sm">Detail</a>
                        <a href=< ?php echo "tl-ds.php?no_surat=$data[no_surat]"; ?> class="btn btn-primary btn-sm ">Proses</a>
                      </td>

                    </tr>
                    <?php $no++;
                      }
                      ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane fade  panel panel-primary " id="use">
            <div class="panel-heading tooltip-test">
              Daftar Pengguna
            </div>
            <div style="padding-bottom:10px;"></div>
            <table id="tuse" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama User</th>
                  <th>Jabatan</th>

                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $no = 1;
                  $query = $mysqli->query("SELECT * FROM tbl_pengguna WHERE jabatan != 'akar'");
                  while($data = $query->fetch_array()){
                    ?>
                  <tr>
                    <td>
                      <?php echo ($no) ?>
                    </td>
                    <td>
                      <?php echo ($data["nip"]) ?>
                    </td>
                    <td>
                      <?php echo ($data["nama_user"]) ?>
                    </td>
                    <td>
                      <?php echo ($data["jabatan"]) ?>
                    </td>

                    <td>
                      <a href= <?php echo "edit-use.php?edit=$data[nip]"; ?> class="btn btn-success btn-sm" >Edit</a>
                      <a href= <?php echo "edit-use.php?del=$data[nip]"; ?> class="btn btn-danger btn-sm " onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a>
                    </td>

                  </tr>
                  <?php $no++;
                  }
                  ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="prof" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Profile</h4>
        </div>
        <div class="modal-body">


          <table class="table table-hover">
            <thead>
              <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
              </tr>
            </thead>
            <tbody>
              <tr \>
                <td>
                  <?php echo ($nip) ?>
                </td>
                <td>
                  <?php echo ($nama) ?>
                </td>
                <td>
                  <?php echo ($jabatan) ?>
                </td>
              </tr>
            </tbody>
          </table>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

<?php 
  $mysqli->close(); 
  include 'foot.php'
?>