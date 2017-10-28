<?php
include('log_procces.php');//includes login script
include("db.php");
?>
<!DOCTYPE html>

<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sistem Informasi Disposisi Surat</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="assets/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>

  <body style= "background:url(assets/bg/smk13.jpg);background-repeat:no-repeat;background-size:100% 100%;">

    <div class="container" >
      <div class="header">
        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand text-uppercase" href="index.php" >SMK Negeri 13 Bandung</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php" data-toggle="tooltip" data-placement="bottom" title="Kembali Ke Beranda" class="tooltip-test"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a data-toggle="modal" data-target="#about" data-toggle="tooltip" data-placement="bottom" title="Tentang Kami" class="tooltip-test"><span class="glyphicon glyphicon-globe"></span> About</a></li>
                <li><a data-toggle="modal" data-target="#contact" data-toggle="tooltip" data-placement="bottom" title="Contact Us" class="tooltip-test"><span class="glyphicon glyphicon-phone"></span> Contact</a></li>

              </ul>
              <ul class="nav navbar-nav navbar-right">

                <li>
                	<!-- <a data-toggle="modal" data-target="#login" data-toggle="tooltip" data-placement="bottom" title="Login Ke Dashboard" class="tooltip-test"> Login</span></a> -->
                    <?php if (empty($_SESSION['login_user'])) { ?>
                    <button type="button" class="btn btn-default navbar-btn" data-container="body" data-toggle="popover" data-placement="bottom"><span class="glyphicon glyphicon-log-in"></span> Login </button>                                   
                    <?php }?> 


                    <?php if (!empty($_SESSION['login_user'])) { ?>
                    <a href="dash.php" >Dashboard </a>
                    <?php }?> 
    	
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>

 
<div style="opacity:0.7;">
      <div class="jumbotron">
        <h2 class="text-center text-primary">Selamat Datang </h1>

        <p class="lead"></p>

        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Sign In</a></p> -->
      </div>

      <div class="row marketing" style="opacity:0.7;">
        <div class="col-lg-4 " style="padding-top:10px; ">
          <div class="panel panel-primary">
            <div class="panel-heading tooltip-test" data-toggle="tooltip" data-placement="auto" title="Surat Masuk Terbaru" >
              Surat Masuk Terbaru
            </div>
              <div class="panel-body">
                  <?php
                  $query = $mysqli->query("SELECT * FROM tbl_surat_masuk ORDER BY `tgl_sm` DESC limit 2");
                  while($data = $query->fetch_array()) { ?>
                  <h4><?php echo ($data["nomor_agenda"]) ?></h4>
                  <p><?php echo ($data["isi_ringkas"]) ?></p>
                  <?php  } ?>
              </div>
          </div>
        </div>

        <div class="col-lg-4 col-lg-offset-4 " style="padding-top:10px;">
          <div class="panel panel-primary">
            <div class="panel-heading tooltip-test" data-toggle="tooltip" data-placement="auto" title="Berita Disposisi Surat Terbaru">
              Disposisi Surat Terbaru
            </div>
              <div class="panel-body">
                  <?php
                  $query = $mysqli->query("SELECT sm.nomor_agenda,ssm.*,ds.* FROM tbl_disposisi_surat ds
                  LEFT JOIN tbl_status_sm ssm ON ds.no_surat = ssm.no_surat
                  LEFT JOIN tbl_surat_masuk sm on ssm.no_surat=sm.no_surat  ORDER BY tanggal_penyelesaian DESC LIMIT 2");
                  while($data = $query->fetch_array()) { ?>
                  <h4><?php echo ($data["nomor_agenda"]) ?></h4>
                  <p><?php echo ($data["diteruskan_kpd"]) ?></p>
                  <?php  } ?>                  
              </div>
          </div>
        </div>




      </div>
    </div> <!-- /container -->

    </div>

      <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">About Us</h4>
            </div>
            <div class="modal-body">
              
              Maulana Prambadi & Meilina

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>   

      <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
            </div>
            <div class="modal-body">

            <p><span class="glyphicon glyphicon-phone"></span> Maulana Prambadi - 085659175203</p>
            <p><span class="glyphicon glyphicon glyphicon-envelope"></span> Maulana Prambadi - themaulxxx@gmail.com</p>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>      

      <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <!--            
               <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Sistem Informasi Disposisi Surat</h4>
               </div> 
              -->

            <div class="modal-body">
              <form class="form-signin" role="form" method="post" action="dash.php">
                <!-- <h2 class="form-signin-heading text-center text-primary">Sistem Informasi Disposisi Surat</h2> -->
                <input type="text" class="form-control" placeholder="Username" required autofocus>
                <input type="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              </form>
            </div>

          </div>
        </div>
      </div>  




      <div class="footer">
        <p class="text-primary container"><span data-toggle="tooltip" data-placement="auto" title="Maulana Prambadi & Meilina" class="tooltip-test"> SMKN 13 Bandung &copy; 2014</span></p>
      </div>

    <div id="popover_content_wrapper" style="display: none">
      <form action="" role="form" method="post">
        <div class="form-group">
          <label for="user">Usera</label>
          <input type="text" class="form-control" id="user" placeholder="username"  required  autofocus name="username">
          <label for="inputPassword3" >Jabatan</label>
          <select class="form-control" name="level" required id="level">
                        <option value="pst">Persuratan</option>    
                        <option value="wka">Wakil Kepala Sekolah</option>    
                        <option value="kpl">Kepala Sekolah</option>    
          </select>
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="***********" required autocomplete="off" name="password">
        </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login" name="submit">
          <div>
          <span class="text-danger"><?php echo $error; ?></span>
          </div>
      </form>
    </div>
    <?php $mysqli->close(); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="assets/js/docs.min.js" type="text/javascript"></script>
    <script type="text/javascript">

 
       $('button[data-toggle=popover]').popover({ 
        html : true,
        trigger: "click", // може да се смени
        content: function() {
          return $('#popover_content_wrapper').html();
        }
    	});


	</script>
    
  </body>
</html>
