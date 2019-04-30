<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Aphrodite</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        .nav-link {
            color: white;
        }

        .bg-luxury-blue {
            background: #002A54;
        }

        .dropdown-toggle:after {
            content: none
        }
    </style>
    <script src="js/main.js"></script>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-luxury-blue text-white">
        <a class="navbar-brand" href="home.php">
            <img src="img/logo/logo_font_white.svg" style="height:23px;" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto container-fluid justify-content-between">
            <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
     Category
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="category_men.html">Men</a>
      <a class="dropdown-item" href="category_woman.html">Woman</a>
    </div>
  </div>

                <li class="col-12 col-lg-9">
                <form action="search.php" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-bell"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-envelope"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white text-capitalize text-center" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <?php
                                echo $_SESSION['username'];
                            ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="#" class="dropdown-item text-center text-capitalize">
                        <i class="fas fa-user"></i>
                            <?php
                                echo $_SESSION['username'];
                            ?>
                        </a>
                        <div class="dropdown-divider"></div>
                        <div class="container">
                            <a class="btn btn-primary col-12" href="login.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <section class="konten">
  <div class="container">
    <h1>Checkout</h1>
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
        $totalbelanja=0;
        
        foreach($_SESSION['keranjang'] as $id_produk => $jumlah):
        $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
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
        $totalbelanja+=$subharga;
        endforeach
        ?>
      </tbody>
      <tfoot>
            <th colspan="4">Total</th>
            <th>Rp</th>
      </tfoot>
      <tfoot>
            <th colspan="4">Subtotal</th>
            <th>Rp. <?php echo number_format($totalbelanja)?></th>
      </tfoot>
    </table>
    <form method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <input type="text" readonly value="<?php echo $_SESSION["tbuser"]['nama']?>" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <input type="text" readonly value="<?php echo $_SESSION["tbuser"]['telepon']?>" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                
                    <select name="id_ongkir" class="form-control">
                        <option value="">Pilihan Pengiriman</option>
                        <?php
                            $ambil = $conn->query("SELECT * FROM ongkir");
                            while($perongkir = $ambil->fetch_assoc())
                            {
                                ?>
                                <option value="<?php echo $perongkir['id_ongkir']?>">
                                <?php echo $perongkir['nama_kota']?> -
                                Rp. <?php echo number_format($perongkir['tarif'])?>
                                </option>
                        <?php
                            }
                        ?>
                    </select>
            </div>
        </div>
        <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap (Beserta Kode Pos)"></textarea>
            </div>
        <button class="btn btn-primary" name="checkout">Checkout</button>
    </form>
    <?php
    if(isset($_POST['checkout']))
    {
        $id_pelanggan = $_SESSION['tbuser']['username'];
        $id_ongkir = $_POST['id_ongkir'];
        $tanggal_pembelian = date("Y-m-d");
        $alamat = $_POST['alamat'];

        $ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
        $arrayongkir = $ambil->fetch_assoc();
        $nama_kota = $arrayongkir['nama_kota'];
        $tarif = $arrayongkir['tarif'];

        $total_pembelian = $totalbelanja + $tarif;

        $conn->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat)
        VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat')");

        $id_pembelian_barusan = $conn->insert_id;
    
        foreach($_SESSION['keranjang'] as $id_produk => $jumlah)
        {
            $ambil=$conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
            $perproduk = $ambil->fetch_assoc();

            $nama = $perproduk['nama_produk'];
            $harga = $perproduk['harga_produk'];
            $berat = $perproduk['berat_produk'];

            $subberat = $perproduk['berat_produk']*$jumlah;
            $subharga = $perproduk['harga_produk']*$jumlah;
            $conn->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
            VALUES('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");
        }
        unset ($_SESSION['keranjang']);
        echo "<script>alert('pembelian sukses');</script>";
        echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
    }
    ?>
    
  </div>
</section>

</body>
</html>