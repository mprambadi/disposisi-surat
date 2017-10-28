<?php
session_start();

$nip = $_SESSION['nip'];
$nama_user = $_SESSION['nama_user'];
$jabatan = $_SESSION['jabatan'];
$level_user = $_SESSION['level_user'];
$hari= date('Y-m-d');
include "../db.php";
include "header.php";

$res=$mysqli->query("SELECT count(status) as status FROM `tbl_status_sm` WHERE status ='undisposed'"); 
$row = $res->fetch_assoc();
$inboxsurat=$row['status'];

$res1=$mysqli->query("SELECT count(status) as status FROM `tbl_status_sm` s LEFT JOIN tbl_disposisi_surat ds on ds.no_surat=s.no_surat WHERE diteruskan_kpd LIKE '%$jabatan%' and ds.proses='unact' ");
$row1 = $res1->fetch_assoc();
$inboxdisposisi=$row1['status'];


switch ($level_user) {
  case 'pst':
    $res=$mysqli->query("SELECT count(no_surat) as status FROM `tbl_surat_masuk` "); 
    $row = $res->fetch_assoc();
    $inboxsurat=$row['status'];
    break;
  case 'kpl':
    $res=$mysqli->query("SELECT count(status) as status FROM `tbl_status_sm` WHERE status ='undisposed'"); 
    $row = $res->fetch_assoc();
    $inboxsurat=$row['status'];
    break;
  case 'wka':
    $res=$mysqli->query("SELECT count(status) as status FROM `tbl_status_sm` s LEFT JOIN tbl_disposisi_surat ds on ds.no_surat=s.no_surat WHERE diteruskan_kpd LIKE '%$jabatan%' and ds.proses='unact' ");
    $row = $res->fetch_assoc();
    $inboxsurat=$row['status'];
  default:
    # code...
    break;
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$nama_user?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo "$nama_user - $jabatan"; ?>
                  
                </p>
              </li>


              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->

  <?php include "navbar.php" ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php 
  if (!empty($_GET['page'])) {
    switch ($_GET['page']) {
      case 'surat':
        include "../menu/surat_masuk.php";
        break;
      case 'input_surat':
        include "../menu/input_surat_masuk.php";
        break;
      case 'edit_surat':
        include "../menu/edit_surat_masuk.php";
        break;
      case 'rekap_surat':
        include "../menu/rekap_surat_masuk.php";
        break;        
      case 'disposisi':
        include "../menu/disposisi.php";
        break;        
      case 'input_disposisi':
        include "../menu/input_disposisi.php";
        break;        
      case 'rekap_disposisi':
        include "../menu/rekap_disposisi.php";
        break;        
      case 'detail_disposisi':
        include "../menu/detail_disposisi.php";
        break;        
      case 'tindak_lanjut_disposisi':
        include "../menu/tindak_lanjut_disposisi.php";
        break;        
      case 'user':
        include "../menu/user.php";
        break; 
      case 'input_user':
        include "../menu/input_user.php";
        break;                
      case 'edit_user':
        include "../menu/edit_user.php";
        break;                
      default:
        include "../menu/dashboard.php";  
        break;
    }
  }else {
    include "../menu/dashboard.php";
  }

  ?>
 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<?php include "footer.php" ?>