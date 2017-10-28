<?php
session_start();//starting session
include("db.php");
$error=''; //variable to store error message
if ($_POST) {

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username atau Password salah"; 
        echo "<meta http-equiv='refresh' content='0; url=./'>";        
    } else {                                                               
        $username=$_POST['username'];  
        $password=$_POST['password'];       
        
        $res = $mysqli->query("SELECT * from tbl_pengguna where password='$password' AND nip='$username' ");
        $data = $res->fetch_array();
        $rows = $res->num_rows;
            if ($rows == 1) {
                /**
                 * session set
                 */
                $_SESSION['nip']=$data['nip'];
                $_SESSION['nama_user']=$data['nama_user'];
                $_SESSION['jabatan']=$data['jabatan'];
                $_SESSION['level_user']=$data['level_user'];
                echo "<meta http-equiv='refresh' content='0; url=layout/index.php'>"; 
            } else {
                $error = "User Atau Password Salah";
                echo "<meta http-equiv='refresh' content='0; url=./'>";
            }
                  
    }
}
