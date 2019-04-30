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
        <a class="navbar-brand" href="#">
            <img src="img/logo/logo_font_white.svg" style="height:23px;" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto container-fluid justify-content-between">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="col-12 col-lg-9">
                <form action="search.php" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button">
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

    <!-- Content -->
    <section class="konten mt-3">
        <div class="container">
            <h2>Purchasing Detail</h2>
            <?php
                $ambil = $conn->query("SELECT * FROM pembelian JOIN tbuser ON pembelian.id_pelanggan=tbuser.username WHERE pembelian.id_pembelian='$_GET[id]'");
                $detail = $ambil->fetch_assoc();
            ?>
            <?php
                $idpelangganyangbeli = $detail['id_pelanggan'];
                $idpelangganyanglogin = $_SESSION['tbuser']['username'];

                if($idpelangganyangbeli!==$idpelangganyanglogin)
                {
                    echo "<script>You're not allowed to open others</script>";
                    echo "<script>location='history.php'</script>";
                    exit();
                }
            ?>
            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian: <?php echo $detail['id_pembelian']?></strong><br>
                    <p>
                        Tanggal: <?php echo $detail['tanggal_pembelian'];?> <br>
                        Total: <?php echo number_format($detail['total_pembelian']);?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong><?php echo $detail['nama'];?></strong><br>
                    <p>
                        <?php echo $detail['telepon'];?> <br>
                        <?php echo $detail['email'];?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?php echo $detail['nama_kota'];?></strong><br>
                    Ongkos Kirim: Rp. <?php echo number_format($detail['tarif'])?><br>
                    Alamat: <?php echo $detail['alamat']?>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor=1;
                    ?>
                    <?php 
                        $totalbelanja=0;
                        $sql = "SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'";
                        $ambil = $conn->query($sql);
                    ?>
                    <?php
                        while($pecah = $ambil->fetch_assoc()){
                            $jumlah = $pecah['jumlah'];
                            $subharga = $pecah['harga']*$jumlah;
                    ?>
                <tr>
                        <td><?php echo $nomor;?></td> 
                        <td><?php echo $pecah['nama'];?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']);?></td>
                        <td><?php echo $pecah['berat'];?> Gr.</td>
                        <td><?php echo $pecah['jumlah'];?></td>
                        <td>Rp. <?php echo number_format($pecah['subharga']);?></td>
                        
                    </tr>
                    <?php
                        $nomor++;
                        $totalbelanja+=$subharga;
                    ?>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <th colspan="5">Total</th>
                    <th>Rp. <?php echo number_format($detail['total_pembelian'])?></th>
                </tfoot>
                <tfoot>
                        <th colspan="5">Subtotal</th>
                        <th>Rp. <?php echo number_format($totalbelanja)?></th>
                </tfoot>
            </table>
            <?php
                
            ?>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                    <p>Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']);?>
                    ke <br> 
                    <strong>
                        BANK BCA 778-9936290-2280 AN. Aphrodite
                    </strong>
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>