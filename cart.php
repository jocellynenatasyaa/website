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

        .quantity {
            float: left;
            margin-right: 15px;
            background-color: #eee;
            position: relative;
            width: 80px;
            overflow: hidden
        }

        .quantity input {
            margin: 0;
            text-align: center;
            width: 15px;
            height: 15px;
            padding: 0;
            float: right;
            color: #000;
            font-size: 20px;
            border: 0;
            outline: 0;
            background-color: #F6F6F6
        }

        .quantity input.qty {
            position: relative;
            border: 0;
            width: 100%;
            height: 40px;
            padding: 10px 25px 10px 10px;
            text-align: center;
            font-weight: 400;
            font-size: 15px;
            border-radius: 0;
            background-clip: padding-box
        }

        .quantity .minus,
        .quantity .plus {
            line-height: 0;
            background-clip: padding-box;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            -webkit-background-size: 6px 30px;
            -moz-background-size: 6px 30px;
            color: #bbb;
            font-size: 20px;
            position: absolute;
            height: 50%;
            border: 0;
            right: 0;
            padding: 0;
            width: 25px;
            z-index: 3
        }

        .quantity .minus:hover,
        .quantity .plus:hover {
            background-color: #dad8da
        }

        .quantity .minus {
            bottom: 0
        }

        .shopping-cart {
            margin-top: 20px;
        }
    </style>
    <script src="js/main.js"></script>
</head>

<<<<<<< HEAD
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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
                <a class="nav-link dropdown-toggle text-white text-capitalize text-center" href="#" id="navbarDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <?php
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
>>>>>>> bcc99d1aeaaf0122e342701259d2cb6b008f1e7e
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
<<<<<<< HEAD
                    </div>

                </div>
            </li>

        </ul>
    </div>
</nav>

<section class="konten" style="margin-top:75px;">
    <div class="container">
        <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Shopping cart
                <a href="home.php" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
            <?php
            
            $nomor=1;
            $totalbelanja=0;
            foreach($_SESSION['keranjang'] as $id_produk => $jumlah):
            $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
            $pecah = $ambil->fetch_assoc();
            $subharga = $pecah['harga_produk']*$jumlah;
            

            ?>
                
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2 text-center">
                    
                    <?php
                    echo '<img class="img-responsive" width="120"
                    height="80" src="data:image/jpeg;base64,'.base64_encode( $pecah['foto_produk'] ).'"/>';
                ?>
                            </div>
                    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                        <h4 class="product-name"><strong><?php echo $pecah['nama_produk'];?></strong></h4>
                        <h4>
                            <small><?php echo $pecah['deskripsi_produk']?></small>
                        </h4>
                    </div>
                    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                            <h6><strong>Rp. <?php echo number_format($subharga);?><span class="text-muted"></span></strong></h6>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="quantity">
                                <input type="button" value="+" class="plus">
                                <input type="number" step="1" max="99" min="1" value="<?php echo $jumlah;?>" title="Qty" class="qty"
                                    size="4">
                                <input type="button" value="-" class="minus">
                            </div>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-right">
                            <button type="button" class="btn btn-outline-danger btn-xs">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
            $nomor++;
            $totalbelanja+=$subharga;
            endforeach
            ?>
                <div class="pull-right">
                    <a href="" class="btn btn-outline-secondary pull-right">
                        Update shopping cart
                    </a>
                </div>
            </div>
            <div class="card-footer">
                <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="cupone code">
                        </div>
                        <div class="col-6">
                            <input type="submit" class="btn btn-default" value="Use cupone">
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin: 10px">
                    <a href="checkout.php" class="btn btn-success pull-right">Checkout</a>
                    <div class="pull-right" style="margin: 5px">
                        Total price: <b>
                        Rp. <?php echo number_format($totalbelanja);
                        ?>
                        
                        </b>
                    </div>
                </div>
            </div>
=======
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
>>>>>>> bcc99d1aeaaf0122e342701259d2cb6b008f1e7e
        </div>
    </div>
    </div>
</section>