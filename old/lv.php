<?php 
  session_start();
  include "db.php"; 

  if($_SESSION){
   /**
   * Session GET 
   */
  $nip = $_SESSION['nip'];
  $nama_user = $_SESSION['nama_user'];
  $jabatan = $_SESSION['jabatan'];
  $level_user = $_SESSION['level_user'];    
  echo "<meta http-equiv='refresh' content='0; url=layout/index.php'>"; 
  
  }

  echo "<meta http-equiv='refresh' content='0; url=./'>"; 



?>