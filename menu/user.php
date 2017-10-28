<section class="content-header">
  <h1>
    User
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="fa fa-dashboard"></i> Home</a>
    </li>
    <li>
      <a href="#">User</a>
    </li>
    <li class="active">List User</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="table_data" class="table table-striped table-hover">
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
                      <a href='<?php echo "?page=edit_user&edit=$data[nip]"; ?>' class="btn btn-success btn-sm">Edit</a>
                      <a href='<?php echo "?page=edit_user&del=$data[nip]"; ?>' class="btn btn-danger btn-sm " onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</a>
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