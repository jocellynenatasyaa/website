<?php
  session_start();
  include 'koneksi.php';
  include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>WOMAN</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
  }
        .bg-luxury-blue {
            background: #002A54;
        }

        .dropdown-toggle:after {
            content: none
        }
  </style>
</head>
<style>


.container {
    max-width: 100%;
  }

  .row {
    margin-right: -15px;
    margin-left: -15px;
    margin: 0px;
  }

  .row-before, .row-after {
    display : table;
    content: "";
  }

  .row-after {
    clear: both;
  }

  .col-1, .col-2, .col-3, .col-4, .col-5, .col-6,
  .col-7, .col-8, .col-9, .col-10, .col-11, .col-12 {
    float: left;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
    border: none;
  }

  .col-1 {
    width: 8.33%;
  }

  .col-2 {
    width: 16.66%;
  }

  .col-3 {
    width: 25%;
  }

  .col-4 {
    width: 33.33%;
  }

  .col-5 {
    width: 41.66%;
  }

  .col-6 {
    width: 50%;
  }

  .col-7 {
    width: 58.33%;
  }

  .col-8 {
    width: 66.66%;
  }

  .col-9 {
    width: 75%;
  }

  .col-10 {
    width: 83.33%;
  }

  .col-11 {
    width: 91.66%;
  }

  .col-12 {
    width: 100%;
  }
  .nav-link {
    color: #002A54;
    }
 </style>

<body class="bg-light">
    <br>
    <br>
    <br>

<div class="container">
  <div class="row">
    <div class="col-3"> 
      <h3>Woman Categories</h3>
     
        <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="category_woman.php">Top</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="womenbottom.php">Bottom</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Jumpsuit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Outwear</a>
        </li>
      </ul>
    </div>
    <div class="col-9">
      <div class="row">
        <div class="col-10">
          <button type="button" class="btn btn-outline-primary">#cute</button>
          <button type="button" class="btn btn-outline-secondary">#cool</button>
          <button type="button" class="btn btn-outline-success">#elegan</button>
          <button type="button" class="btn btn-outline-info">#wedding</button>
          <button type="button" class="btn btn-outline-warning">#colorful</button>
          <button type="button" class="btn btn-outline-danger">#maxi</button>
          <button type="button" class="btn btn-outline-dark">#pretty</button>
          <button type="button" class="btn btn-outline-primary">#night</button>
          <button type="button" class="btn btn-outline-secondary">#overall</button>
        </div>
        <div class="col-2">
          <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
               Sort by :
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">High Price - Low Price</a>
              <a class="dropdown-item" href="#">Low Price - High Price</a>
              <a class="dropdown-item" href="#">Favourite</a>
              <a class="dropdown-item" href="#">Hot Item</a>
              <a class="dropdown-item" href="#">Size</a>
            </div>
          </div>
        </div>
    </div> 
    <hr>
    <br> <br> 
    <section class="konten mt-3">
        <div class="container">
            <div class="row">
                <?php
                include 'koneksi.php';
                $data=array();
                $ambil = $conn->query("SELECT * FROM produk WHERE kategori='Woman Top'");
                    while ($perproduk = $ambil->fetch_assoc()){
                ?>
                <div class="col-md-4">
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

  </div>
</div>
</div>
<hr>

</div>
</body>
</html>
