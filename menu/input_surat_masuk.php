<?php 
$kode_surats = array (
"0|Pilih Kode Surat",
"800|kepegawaian",
"900|keuangan",
"420|PENDIDIKAN",
"421|Sekolah",
"421.1|Pra Sekolah",
"421.2|Sekolah Dasar",
"421.3|Sekolah Menengah",
"421.4|Sekolah Tinggi",
"421.5|Sekolah Kejuruan",
"421.6|Kegiatan Sekolah, Dies Natalis Lustrum",
"421.7|Kegiatan Pelajar",
"421.71|Reuni Darmawisata",
"421.72|Pelajar Teladan",
"421.73|Resimen Mahasiswa",
"421.8|Sekolah Pendidikan Luar Biasa",
"421.9|Pendidikan Luar Sekolah / Pemberantasan Buta Huruf",
"422|Administrasi Sekolah",
"422.1|Persyaratan Masuk Sekolah, Testing, Ujian, Pendaftaran, Mapras, Perpeloncoan",
"422.2|Tahun Pelajaran",
"422.3|Hari Libur",
"422.4|Uang Sekolah, Klasifikasi Disini SPP",
"422.5|Beasiswa",
"423|Metode Belajar",
"423.1|Kuliah",
"423.2|Ceramah, Simposium",
"423.3|Diskusi",
"423.4|Kuliah Lapangan, Widyawisata, KKN, Studi Tur",
"423.5|Kurikulum",
"423.6|Karya Tulis",
"423.7|Ujian",
"424|Tenaga Pengajar, Guru, Dosen, Dekan, Rektor",
"425|Sarana Pendidikan",
"425.1|Gedung",
"425.11|Gedung Sekolah",
"425.12|Kampus",
"425.13|Pusat Kegiatan Mahasiswa",
"425.2|Buku",
"425.3|Perlengkapan Sekolah  ");

$message = 'hide';
  if ($_POST) { 

    $lokasi_file=$_FILES['nama_file']['tmp_name'];
    $nama_file=$_FILES['nama_file']['name'];
    $tipe = explode(".",$nama_file);
    $nn=time();
    $nama_baru = $nn."_".$tipe[0].".".$tipe[1];
    move_uploaded_file($lokasi_file,"../file-sm/$nama_baru");
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
      $message = "show";

    }
?>
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
    <li class="active">Input Surat Masuk</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="alert alert-success alert-dismissible alert-message <?=$message?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data berhasil disimpan
          </div>
          <?php 
              $query = $mysqli->query("SELECT * FROM tbl_surat_masuk");
              $nomor_surat = $query->num_rows+1;
            ?>        
          <h3 class="box-title">Input Surat Masuk</h3>
          <div class="no-surat hide"><?php echo $nomor_surat ?></div>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Kode Surat</label>
              <div class="col-sm-4">
                <select name="kode_sm"  data-size="5" class="form-control select2 kode-sm" data-live-search="true">
                <?php foreach ($kode_surats as $kode_surat) : ?>
                  <?php $kode_surat = explode('|',$kode_surat) ?>
                  <option value="<?=$kode_surat[0]?>"><?=$kode_surat[0].' - '.$kode_surat[1] ?></option>
                <?php endforeach; ?>
                </select>
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
                <input type="text" class="form-control nomor_agenda" id="inputPassword3" placeholder="Nomor Agenda" name="nomor_agenda" required>
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

                <input type="text" class="form-control" id="datepicker" placeholder="Tanggal" autocomplete="off" name="tgl_sm" data-date-format="yyyy-mm-dd"
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
                <input type="text" class="form-control" id="datepicker2" placeholder="Tanggal Diteruskan" autocomplete="off" name="tgl_diteruskan"
                  data-date-format="yyyy-mm-dd" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">File Surat Masuk</label>
              <div class="col-sm-4">
                <input type="file" class="form-control" placeholder="File Surat Masuk" name="nama_file">
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Pengolah</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Pengolah" value="<?php echo ($nama_user) ?>" readonly
                  name="pengolah">
              </div>
            </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type='hidden' value='1' name="inputsurat" />
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>