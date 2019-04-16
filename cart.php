<?php
session_start();
$koneksi = new mysqli("localhost","root","","aphrodite");

?>
<!DOCTYPE html>
<html>
<head>
  <title>Aphrodite</title>
  <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
<!-- Navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="cart.php">Cart</a>
                </li>
                <li>
                    <a href="login.php">Login</a>
                </li>
                <li>
                    <a href="checkout.php">Checkout</a>
                </li>
            </ul>
        </div>
    </nav>
<section class="konten">
  <div class="container">
    <h1>Cart</h1>
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $nomor=1;
          foreach($_SESSION['keranjang'] as $id_produk => $jumlah):
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
          $pecah = $ambil->fetch_assoc();
          $subharga = $pecah['harga_produk']*$jumlah;
        ?>
        <tr>
          <td><?php echo $nomor;?></td>
          <td><?php echo $pecah['nama_produk'];?></td>
          <td>Rp.<?php echo number_format($pecah['harga_produk']);?></td>
          <td><?php echo $jumlah;?></td>
          <td>Rp. <?php echo number_format($subharga);?></td>
        </tr>
        <?php
        $nomor++;
        endforeach
        ?>
      </tbody>
    </table>
    <a href="home.php" class="btn btn-default">Continue Shopping</a>
    <a href="checkout.php" class="btn btn-primary">Checkout</a>
  </div>
</section>
</body>
</html>