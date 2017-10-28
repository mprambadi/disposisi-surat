<section class="content-header">
  <h1>
    Disposisi
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="fa fa-dashboard"></i> Home</a>
    </li>
    <li>
      <a href="#">Disposisi</a>
    </li>
    <li class="active">Rekap Disposisi Surat</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Rekap Disposisi Surat</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="table_data" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Agenda</th>
                  <th>Perihal</th>
                  <th>Tgl Penyelesaian</th>
                  <th>Instruksi</th>
                  <th>Diteruskan Kepada</th>
                  <th>Tindak Lanjut</th>

                  <?php if ($level_user=="kpl") { ?>
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
                        $warna = "bg-red text-center";
                      }
                      else {
                        $warna = "bg-green text-center";
                      }
                    ?>
                    <td>
                      <div class="<?php echo $warna;?>">
                        <?php echo ($data["proses"]) ?>
                      </div>
                    </td>
                    <?php if ($level_user=="kpl") { ?>
                    <td>
                      <a href='<?php echo "edit-ds.php?no_surat=$data[no_surat]"; ?>' class="btn btn-success btn-sm btn-block">edit</a>
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
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>