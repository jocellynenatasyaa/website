<?php
    session_start();
    include 'koneksi.php';
    $id_produk = $_GET['id'];
    $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $detail = $ambil->fetch_assoc();
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

    <!-- Navbar -->
    <nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-luxury-blue text-white">
        <a class="navbar-brand" href="#" onclick="loadLandingPage()">
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
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button">
                                <i class="fa fa-search" onclick="f_search()"></i>
                            </button>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="loadCartPage()">
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

    <section class="kontent">
        <div class="container" style="margin-top:70px;">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $detail['foto_produk'] ).'"/>';
                ?>
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail['nama_produk']?></h2>
                    <h4>Rp. <?php echo number_format($detail['harga_produk']);?></h4>

                    <form method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" name="jumlah" min="1" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['beli']))
                        {
                            $jumlah = $_POST['jumlah'];
                            $_SESSION['keranjang'][$id_produk] = $jumlah;
                            echo "<script>location='cart.php';</script>";
                        }
                    ?>
                    <p><?php echo $detail['deskripsi_produk']?></p>
                </div>
            </div>
        </div>
    </section>