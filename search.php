<?php
    session_start();
    include 'koneksi.php';
    $search = $_GET['search'];

    $data=array();
    $ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$search%'
        OR deskripsi_produk LIKE '%$search%'");
    while($pecah = $ambil->fetch_assoc())
    {
        $data[]=$pecah;
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
    <div class="container" style="margin-top:70px;">
        <h3>Hasil Pencarian : <?php echo $search;?></h3>
        <?php
            if(empty($data)):
                ?>
                <div class="alert alert-danger">Pencarian tidak ditemukan</div>
            <?php endif
        ?>
        
        <div class="row">
            <?php
                foreach ($data as $key => $value):
            ?>
            <div class="col-md-3">
                <div class="card">
                <?php
                    echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $value['foto_produk'] ).'"/>';
                ?>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $value['nama_produk'];?></h3>
                        <p class="card-text"><?php echo $value['deskripsi_produk'];?></p>
                        <h5 class="card-subtitle">Rp. <?php echo number_format($value['harga_produk']);?></h5>
                        <br>
                        <a href="beli.php?id=<?php echo $value['id_produk'];?>" class="btn btn-primary">Beli</a>
                        <a href="detail.php?id=<?php echo $value['id_produk'];?>"
                            class="btn btn-default">Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>