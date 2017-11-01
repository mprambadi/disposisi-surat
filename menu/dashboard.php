<?php 
$surat = 'hide';
$disposisi = 'hide';
$user = 'hide';
$col = 'col-lg-4 col-xs-6';
$link_surat = '';
$link_disposisi = '';
  switch ($level_user) {
    case 'pst':
      $surat = 'show';
      $disposisi = 'show';
      $link_surat = '?page=rekap_surat';
      $link_disposisi ='?page=rekap_disposisi';
      break;
    case 'wka':
      $disposisi = 'show';
      $link_surat = '?page=surat';
      $link_disposisi ='?page=disposisi';
      break;
    case 'kpl':
      $surat = 'show';
      $disposisi = 'show';
      $link_surat = '?page=surat';
      $link_disposisi ='?page=rekap_disposisi';

      break;
    default:
      # code...
      break;
  }

?>



<section class="content-header">
<h1>
  Dashboard
  <small>Control panel</small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Dashboard</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="<?=$col?> <?=$surat?>">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?=$inboxsurat?></h3>

        <p>Surat Masuk</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="<?=$link_surat?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-4 col-xs-6 <?=$disposisi?>">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?=$inboxdisposisi?></sup></h3>
        <p>Disposisi</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="<?=$link_disposisi?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-4 col-xs-6 <?=$user?>">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <?php 
          $res = $mysqli->query("SELECT * FROM tbl_pengguna");
          $user = $res->num_rows;
        ?>
        <h3><?=$user?></h3>
        <p>User </p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

</div>
<!-- /.row -->
<!-- Main row -->

</section>
<!-- /.content -->

