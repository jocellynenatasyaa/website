<?php
    include "koneksi.php";

    if(isset($_POST['signup'])){
        $username = mysqli_real_escape_string($conn,trim($_POST['username']));
        $email = mysqli_real_escape_string($conn,trim($_POST['email']));
        $pass = md5(mysqli_real_escape_string($conn,trim($_POST['pass'])));
        $repass = md5(mysqli_real_escape_string($conn,trim($_POST['repass'])));
    
        if($pass != $repass){
            header('location: register.php');
        }else {
            $sql = 'insert into tbuser values(
                "'.$username.'",
                "'.$email.'",
                "'.$pass.'"
            )';
        mysqli_query($conn,$sql);
        header('location: login.php');
        }
        //echo $sql;
    }
?>