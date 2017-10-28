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
    <li class="active">Inbox</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Inbox Surat Masuk</h3>
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
                  <a href= <?php echo "?page=detail_disposisi&no_surat=$data[no_surat]"; ?> class="btn btn-success btn-sm"> detail </a>
                  <a href= <?php echo "?page=input_disposisi&no_surat=$data[no_surat]"; ?> class="btn btn-primary btn-sm"> disposisi </a>

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