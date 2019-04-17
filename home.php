<?php
    session_start();
    $koneksi = new mysqli("localhost","root","","aphrodite");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
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

    <!-- Content -->
    <section class="konten">
        <div class="container">
            <h1>Product</h1>

            <div class="row">
                <?php
                $ambil = $koneksi->query("SELECT * FROM produk");
                while ($perproduk = $ambil->fetch_assoc()){
                ?>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="" width="300px" height="300px">
                        <div class="caption">
                            <h3><?php echo $perproduk['nama_produk'];?></h3>
                            <h5>Rp. <?php echo number_format($perproduk['harga_produk']);?></h5>
                            <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Beli</a>
                            <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-default">Detail</a>
                        </div>
                    </div>
                </div>
                <?php 
                } 
                ?>
            </div>
        </div>
    </section>
</body>
</html>