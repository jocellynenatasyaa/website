<?php
    session_start();
    include 'navbar.php';
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
        .bg-footer p{
            color:white;
        }
        .bg-footer {
            background-color: #002A54;
            padding: 50px 0 30px;
        }
        .footer-heading {
            letter-spacing: 2px;
        }

        .footer-link a {
            color: white;
            line-height: 40px;
            font-size: 14px;
            transition: all 0.5s;
        }

        .footer-link a:hover {
            color: #1bbc9b;
        }

        .contact-info {
            color: white;
            font-size: 14px;
        }

        .footer-social-icon {
            font-size: 15px;
            height: 34px;
            width: 34px;
            line-height: 34px;
            border-radius: 3px;
            text-align: center;
            display: inline-block;
        }

        .facebook {
            background-color: #4e71a8;
            color: #ffffff;
        }

        .twitter {
            background-color: #55acee;
            color: #ffffff;
        }

        .google {
            background-color: #d6492f;
            color: #ffffff;
        }

        .footer-alt {
            color: white;
        }

        .footer-heading {
            position: relative;
            padding-bottom: 12px;
        }

        .footer-heading:after {
            content: '';
            width: 25px;
            border-bottom: 1px solid #FFF;
            position: absolute;
            left: 0;
            bottom: 0;
            display: block;
            border-bottom: 1px solid #1bbc9b;
        }

    </style>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>
<style>
    .footer {
        background-color: #002A54;
        color: white;
    }
    .carousel-inner{
        height: 100vh;
    }
</style>

<body class="bg-light">
    <!-- carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/carousel/2.jpg" alt="Men" width="100%">
                <div class="carousel-caption">
                    <h3>Welcome to Aphrodite</h3>
                    <p>Enjoy your shopping!!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/carousel/1.jpg" alt="woman" width="100%">
                <div class="carousel-caption">
                    <h3>Welcome to Aphrodite</h3>
                    <p>Enjoy your shopping!!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/carousel/3.jpg" alt="family" width="100%">
                <div class="carousel-caption">
                    <h3>Welcome to Aphrodite</h3>
                    <p>Enjoy your shopping!!</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <br>
    <!-- Content -->
    <section class="konten mt-3">
        <div class="container">
            <div class="row">
                <?php
                 include 'koneksi.php';
                    $ambil = $conn->query("SELECT * FROM produk");
                    while ($perproduk = $ambil->fetch_assoc()){
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <?php
                    echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $perproduk['foto_produk'] ).'"/>';
                ?>
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $perproduk['nama_produk'];?></h3>
                            <p class="card-text"><?php echo $perproduk['deskripsi_produk'];?></p>
                            <h5 class="card-subtitle">Rp. <?php echo number_format($perproduk['harga_produk']);?></h5>
                            <br>
                            <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Buy</a>
                            <a href="description.php?id=<?php echo $perproduk['id_produk'];?>"
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
     <!-- footer -->

     <footer class="section bg-footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="https://ski.sch.id/new/smk-kristen-immanuel/">
                        <h4 style="font-size:2rem" class="display-4"> SMK KRISTEN IMMANUEL PONTIANAK </h4>
                    </a>
                    <p>Smart, Wise, and Accountable</p>
                    <br><br>
                    <p>Letnan Jendral Sutoyo Street, Parit Tokaya, South Pontianak 
                    <br>Pontianak City, West Kalimantan 78113</p>
                    </div>
                <div class="col-lg-3">
                    <div class="">
                        <h6 class="footer-heading text-uppercase text-white">Help</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="">Sign Up </a></li>
                            <li><a href="">Login</a></li>
                            <li><a href="">Terms of Services</a></li>
                            <li><a href="">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="">
                        <h6 class="footer-heading text-uppercase text-white">Contact Us</h6>
                        <p class="contact-info">0812 5015 0667</p>
                        <p class="contact-info">aphrodite@gmail.com</p>
                        <div class="mt-5">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fab facebook footer-social-icon fa-facebook-f"></i></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab twitter footer-social-icon fa-twitter"></i></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab google footer-social-icon fa-google"></i></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-center">
                    <img class="img-fluid" src="images/smk.png" alt="smkkristenimmanuellogo">
                </div>

            </div>
        </div>

        <div class="text-center mt-5">
            <p class="footer-alt mb-0 f-14">2019 © Aphrodite, All Rights Reserved</p>
        </div>
    </footer>

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