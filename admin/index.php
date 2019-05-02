<?php
 include '../php/koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    
</style>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">
            <img height="25" src="../img/logo/logo_font_white.svg" alt="">
        </a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../login.php"><i class="fas fa-sign-out-alt"></i> Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid pb-2">
        <div class="row">
            <?php
                    if(isset($_GET['halaman']))
                    {
                        if($_GET['halaman']=="product")
                        {
                            include 'product.php';
                        }
                        elseif($_GET['halaman']=="transaction")
                        {
                            include 'pembelian.php';
                        }
                        elseif($_GET['halaman']=="customers")
                        {
                            include 'pelanggan.php';
                        }
                        elseif($_GET['halaman']=="detail")
                        {
                            include 'detail.php';
                        }
                        elseif($_GET['halaman']=="addproduct")
                        {
                            include 'addproduct.php';
                        }
                        elseif($_GET['halaman']=="hapusproduct")
                        {
                            include 'hapusproduct.php';
                        }
                        elseif($_GET['halaman']=="ubahproduct")
                        {
                            include 'ubahproduct.php';
                        }
                        elseif($_GET['halaman']=="pembayaran")
                        {
                            include 'pembayaran.php';
                        }
                        elseif($_GET['halaman']=="reports")
                        {
                            include 'report.php';
                        }
                        elseif($_GET['halaman']=="logout")
                        {
                            include 'logout.php';
                        }
                    }
                    else
                    {
                        include 'home.php';
                    }
                ?>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Dashboard Template for Bootstrap_files/jquery-3.2.1.slim.min.js.download"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>






</body>

</html>