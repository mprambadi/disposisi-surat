<?php 
$rekap_disposisi = 'show';
$input_surat = 'hide';
$input_user = 'hide';
$rekap_surat = 'hide';
$inbox_surat = 'hide';
$inbox_disposisi = 'hide';
$rekap_user = 'hide';
$status_surat = 'hide';
$status_user = 'hide';
$status_disposisi = 'hide';

  switch ($level_user) {
    case 'pst':
      $status_surat = 'show';
      $input_surat = 'show';
      $rekap_surat = 'show';
      $status_disposisi = 'show';
      break;
    case 'kpl':
      $status_surat = 'show';
      $inbox_surat = 'show';
      $status_disposisi = 'show';
      break;
    case 'wka':
      $status_disposisi = 'show';
      $inbox_disposisi = 'show';
      break;
    case 'akr':
      $status_user = 'show';
      $input_user = 'show';
      $rekap_user = 'show';
      break;
    default:

      break;
  }
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="active">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span> Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#" class='<?=$status_surat?>'>
            <i class="fa fa-envelope"></i> <span>Surat Masuk</span>
                            <span class="pull-right-container">
                  <small class="label pull-right bg-green"><?=$inboxsurat?></small>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class='<?=$inbox_surat?>'>
              <a href="index.php?page=surat">
                <i class="fa fa-circle-o"></i> Inbox 
                <span class="pull-right-container">
                  <small class="label pull-right bg-green"><?=$inboxsurat?></small>
                </span>
              </a>
            </li>
            <li class='<?=$input_surat?>'><a href="index.php?page=input_surat"><i class="fa fa-circle-o"></i> Input Surat Masuk</a></li>
            <li class='<?=$rekap_surat?>'><a href="index.php?page=rekap_surat"><i class="fa fa-circle-o"></i> Rekap Surat Masuk <small class="label pull-right bg-green"><?=$inboxsurat?></small></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#" class='<?=$status_disposisi?>'>
            <i class="fa fa-envelope"></i> <span>Disposisi</span>
                            <span class="pull-right-container">
                  <small class="label pull-right bg-green"></small>
                </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$inbox_disposisi?>">
              <a href="index.php?page=disposisi">
                <i class="fa fa-circle-o"></i> Inbox 
                <span class="pull-right-container">
                  <small class="label pull-right bg-green"><?=$inboxsurat?></small>
                </span>
              </a>
            </li>
            <!-- <li><a href="index.php?page=input_disposisi"><i class="fa fa-circle-o"></i> Input Disposisi</a></li> -->
            <li class="<?=$rekap_disposisi?>"><a href="index.php?page=rekap_disposisi"><i class="fa fa-circle-o"></i> Rekap Disposisi Surat</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#" class='<?=$status_user?>'>
            <i class="fa fa-envelope"></i> <span>User</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$rekap_user?>">
              <a href="index.php?page=user">
                <i class="fa fa-circle-o"></i> List User 
              </a>
            </li>
            <li class="<?=$input_user?>"><a href="index.php?page=input_user"><i class="fa fa-circle-o"></i> Input User</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>