<?php
    session_start();
    include 'koneksi.php';

    $idpem=$_GET['id'];
    $ambil = $conn->query("SELECT * FROM pembelian where id_pembelian='$idpem'");
    $detpem = $ambil->fetch_assoc();

    $id_pelanggan_beli = $detpem['id_pelanggan'];
    $id_pelanggan_login = $_SESSION['tbuser']['username'];

    if($id_pelanggan_login!==$id_pelanggan_beli)
    {
        echo "<script>alert('Your're not allowed);</script>";
        echo "<script>location='history.php';</script>";
        exit();
    }
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
<style>


  footer {
      background-color: #002A54;
  }
 </style>

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
<br><br><br>

<div class="container">
  <h2>Konfirmasi Pembayaran</h2>
  <p>Kirim bukti pembayaran anda disini</p>
  <div class="alert alert-info">Total tagihan anda <strong>Rp. <?php echo number_format($detpem['total_pembelian'])?></strong></div>

  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Penyentor</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
        <label>Bank</label>
        <input type="text" name="bank" class="form-control">
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="number" min="1" name="jumlah" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto Bukti</label>
        <input type="file" name="bukti" class="form-control">
    </div>
    <button class="btn btn-primary" name="kirim">Kirim</button>
  </form>
</div>
<?php
    if (isset($_POST['kirim']))
    {
        $namabukti = $_FILES['bukti']['name'];
        $lokasibukti = $_FILES['bukti']['tmp_name'];
        $namafiks = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");

        $conn->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
        VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

        $conn->query("UPDATE pembelian SET status='Sudah Dibayar' WHERE id_pembelian='$idpem'");
        echo "<script>alert('Konfirmasi Pembayaran Sedang di proses')</script>";
        echo "<script>location='history.php';</script>";
    }
?>
</body>
</html>