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
      color :white;
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
        <a class="dropdown-item" href="category_men.php">Men</a>
        <a class="dropdown-item" href="category_woman.php">Woman</a>
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
                      <a href="wishlist.php" class="nav-link">
                          <i class="fas fa-heart"></i>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="cart.php" class="nav-link">
                          <i class="fas fa-shopping-cart"></i>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="chatting.php" class="nav-link">
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
                          <a href="profile.php" class="dropdown-item text-center text-capitalize">
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