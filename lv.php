<?php 
  $res = $mysqli->query("select * from tbl_pengguna where nip='$username'");
  $row = $res->fetch_assoc() ;

  $nama =$row['nama_user'];
  $nip =$row['nip'];
  $level =$row['level_user'];
  $jabatan =$row['jabatan'];
  
?>