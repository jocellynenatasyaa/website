<?php
    session_start();
    include 'koneksi.php';
    $id_produk = $_GET['id'];
    $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $detail = $ambil->fetch_assoc();
    include 'navbar.php';
?>

<br><br><br>
<div class container>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-9">
    <h2> Detail WishList </h2><hr>
        <table class="table">
    <thead class="thead-dark">
      <tr>
        <th><center>Product</center></th>
        <th><center>Name</center></th>
        <th><center>Price</center></th>
        <th><center>Action</center></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><center></center> </td>
        <td><center>Denim Skirt</center></td>
        <td><center>125.000</center></td>
        <td><center>
        <button type="button" class="btn btn-success">ADD</button>
        <button type="button" class="btn btn-danger">Remove</button></center>
        </td>
      </tr>
    </tbody>
  </table>
        </div>
        <div class="col-1">
        </div>
    </div>
</div>