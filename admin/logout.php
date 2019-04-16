<?php
session_destroy();
echo "<script>alert('You're already Logout!');</script>";
echo "<script>location='login.php';</script>";
?>