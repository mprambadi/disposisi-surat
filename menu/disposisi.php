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
    <li class="active">Inbox</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Inbox Disposisi Surat</h3>
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
                      <a href='<?php echo "?page=detail_disposisi&no_surat=$data[no_surat]"; ?>' class="btn btn-success btn-sm">Detail</a>
                      <a href='<?php echo "?page=tindak_lanjut_disposisi&no_surat=$data[no_surat]"; ?>' class="btn btn-primary btn-sm ">Proses</a>
                    </td>

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