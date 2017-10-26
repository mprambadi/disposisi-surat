<?php
session_start();//starting session
include("db.php");
$error=''; //variable to store error message
if ($_POST) {

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username atau Password salah"; 
    } else {                                                               
        $username=$_POST['username'];  
        $password=$_POST['password'];       
        
        $res = $mysqli->query("SELECT * from tbl_pengguna where password='$password' AND nip='$username' ");
        $rows = $res->num_rows;
            if ($rows == 1) {
                $_SESSION['login_user']=$username;//Initializing Session
                echo "<meta http-equiv='refresh' content='0; url=dash.php'>"; 
            } else {
                $error = "User Atau Password Salah";                
            }
                  
    }
}
?>