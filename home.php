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
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
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
                <li class="nav-item">
                    <a href="#" class="nav-link">Your Name</a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- carousel -->

    <div style="margin-top:40px;" id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
            <li data-target="#carouselId" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="img-fluid" src="images/carousel/product1.jpg"
                    data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="images/carousel/product2.jpg"
                    data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="images/carousel/product3.jpg"
                    data-src="holder.js/900x500/auto/#666:#444/text:Third slide" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="images/carousel/product4.jpg"
                    data-src="holder.js/900x500/auto/#666:#444/text:Third slide" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Content -->
    <section class="konten mt-3">
        <div class="container">
            <div class="row">
                <?php
                    $ambil = $koneksi->query("SELECT * FROM produk");
                    while ($perproduk = $ambil->fetch_assoc()){
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $perproduk['nama_produk'];?></h3>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus,
                                incidunt!</p>
                            <h5 class="card-subtitle">Rp. <?php echo number_format($perproduk['harga_produk']);?></h5>
                            <br>
                            <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Beli</a>
                            <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>"
                                class="btn btn-default">Detail</a>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>