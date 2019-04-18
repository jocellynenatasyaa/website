<?php 
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "select username,password from tbuser where username='$username' AND password='$password'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($query);
	if ($row >= 1) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		header("location: home.php");
	}else if($username == "admin" && $password == "21232f297a57a5a743894a0e4a801fc3"){
		header("location:admin/index.php");
	}
	else{

		header("location: login.php");
	}
	echo "$username $password"
 ?>