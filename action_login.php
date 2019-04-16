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
	}else{
		header("location: login.php");
	}
 ?>