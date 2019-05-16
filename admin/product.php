<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.php?halaman=product">
                <i class="fas fa-tshirt"></i>
                    Product
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=transaction">
                <i class="fas fa-hand-holding-usd"></i>
                    Transaction
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=customers">
                <i class="fas fa-users"></i>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=reports">
                <i class="fas fa-file"></i>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">

                    Integrations
                </a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


    <?php
error_reporting(0);
    $toast = $_GET['toast'];
    if($toast == 1){
        ?>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay=5000 data-autohide="true">
            <div class="toast-header">
                <?php 
                    if($_GET['msg'] == 'added'){
                        echo 
                "<div class='bg-success rounded mr-2' style='padding:10px'></div>";

                    }
                    else if($_GET['msg'] == 'removed'){
                        echo "<div class='bg-danger rounded mr-2' style='padding:10px'></div>";;
                    }
                    else {
                        echo 
                "<div class='bg-success rounded mr-2' style='padding:10px'></div>";
                    }
                ?>
                <strong class="mr-auto">Aphrodite Admin</strong>
                <small>Just Now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Data 
                <?php 
                    if($_GET['msg'] == 'added'){
                        echo "added";
                    }
                    else if($_GET['msg'] == 'removed'){
                        echo "removed";
                    }
                    else{
                        echo "updated";
                    }
                ?>
            </div>
        </div>
    <?php
    }
?>
    <h2 class="display-4 text-capitalize">
        <?php
            echo $_GET['halaman'];
        ?>
        Data
    </h2>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Weight</th>
                <th>Photo</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor=1;
        ?>
            <?php 
            $ambil = $koneksi->query("SELECT * FROM produk");
        ?>
            <?php
            while($pecah = $ambil->fetch_assoc()){
        ?>
            <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $pecah['nama_produk'];?></td>
                <td><?php echo $pecah['harga_produk'];?></td>
                <td><?php echo $pecah['berat_produk'];?></td>
                <td style="max-width:40px;max-height:40px">
                    <?php
                    echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $pecah['foto_produk'] ).'"/>';
                    ?>
                </td>
                <td><?php echo $pecah['stok'];?></td>
                <td><?php echo $pecah['kategori'];?></td>
                <td><?php echo $pecah['deskripsi_produk'];?></td>
                <td>
                <a href="index.php?halaman=ubahproduct&id=<?php echo $pecah['id_produk'];?>"
                        class="btn btn-warning text-white">Update</a>
                    <a href="index.php?halaman=hapusproduct&id=<?php echo $pecah['id_produk'];?>"
                        class="btn-danger btn">Delete</a>
                    
                </td>
            </tr>
            <?php
            $nomor++;
        ?>
            <?php
            }
        ?>
        </tbody>
    </table>
    <a href="index.php?halaman=addproduct" classbtn btn-primary> Add Data</a>

</main>

<script>
    $(document).ready(function () {
        $('.toast').toast('show');

    });
</script>