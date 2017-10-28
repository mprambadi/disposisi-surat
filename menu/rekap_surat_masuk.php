<section class="content-header">
  <h1>
    Surat Masuk
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="fa fa-dashboard"></i> Home</a>
    </li>
    <li>
      <a href="#">Surat Masuk</a>
    </li>
    <li class="active">Rekap Surat Masuk</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Rekap Surat Masuk</h3>
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
                  <th>Asal Surat</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php
                    $no = 1;
                    $query = $mysqli->query("SELECT * FROM tbl_surat_masuk sm LEFT JOIN tbl_status_sm ssm ON sm.`no_surat` = ssm.`no_surat` ORDER BY sm.no_surat DESC");
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
                      <a href= '<?php echo "?page=edit_surat&no_surat=$data[no_surat]"; ?>' class="btn btn-success btn-sm btn-block">edit</a>
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
