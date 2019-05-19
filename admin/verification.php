<?php
  include '../koneksi.php';
  $notemp =  $_GET['notemp'];

  $sql2 = "insert into store (store_name,city,image,username,phone_number) select tempstore.store_name,tempstore.city,tempstore.image,tempstore.username,tempstore.phone_number from tempstore where tempstore.notemp = '$notemp'";
  $query2 = mysqli_query($conn,$sql2);
  $delete = "delete from tempstore where notemp=$notemp";
  mysqli_query($conn,$delete);

  header('location: http://localhost/website/admin/index.php?halaman=customers')

  

?>