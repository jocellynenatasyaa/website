<?php
    session_start();
   
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
        <a class="navbar-brand" href="#">
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
                            <a class="btn col-12" href="history.php">
                                
                                History
                            </a>
                        </div>
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

    <!-- carousel -->
<<<<<<< HEAD
        <div id="ajaxContent">
        <div style="margin-top:40px;" id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
            <li data-target="#carouselId" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="img-fluid" src="images/carousel/men.jpg"
                    data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="images/carousel/woman.jpg"
                    data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="images/carousel/family.jpg"
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

    <!-- flash sale -->

<div class="container">
    <div class="row">
        <div class="col-6">
            
        </div>
        <div class="col-6">
        </div>
    </div>
</div>



=======
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
>>>>>>> 5d43afd4917df041ef8d9adf14462459ac79a305
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
                            <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Beli</a>
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

<<<<<<< HEAD
        </div>
        <hr>

        <!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">

<!-- Footer Elements -->
<div class="container">
=======
          <div class="row">
          <div class="col-12">
          <div class="card bg-warning text-white">
    <div class="card-body"><center><h2>Enjoy Free Delivery </h2> <h5><i>until 11 Sept' 2019</i></h5></center>
    </div>
  </div>
          </div>
          </div>
          <br>
>>>>>>> 5d43afd4917df041ef8d9adf14462459ac79a305

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-md-6 mb-4">

      <!-- Form -->
      <img src="images/logo.png">
      <!-- Form -->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-6 mb-4">

     
    
    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->

</div>
<!-- Footer Elements -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">
  <a href="https://ski.sch.id/new/smk-kristen-immanuel/"> SMK KRISTEN IMMANUEL PONTIANAK</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

    
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