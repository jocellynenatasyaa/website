
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
                <a class="nav-link" href="index.php?halaman=product">
                <i class="fas fa-tshirt"></i>
                    Product
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.php?halaman=transaction">
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
                <a class="nav-link" href="#">
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


<h2>Purchasing Detail</h2>
<?php
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN tbuser ON pembelian.id_pelanggan=tbuser.username WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>

<strong><?php echo $detail['nama'];?></strong><br>
<p>
    <?php echo $detail['telepon'];?> <br>
    <?php echo $detail['email'];?>
</p>
<p>
    <?php echo $detail['tanggal_pembelian'];?> <br>
    <?php echo $detail['total_pembelian'];?>
</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Total</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nomor=1;
        ?>
        <?php 
            $sql = "SELECT * FROM pembelian_produk LEFT JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'";
            $ambil = $koneksi->query($sql);
        ?>
        <?php
            while($pecah = $ambil->fetch_assoc()){
        ?>
    <tr>
            <td><?php echo $nomor;?></td> 
            <td><?php echo $pecah['nama_produk'];?></td>
            <td><?php echo $pecah['harga_produk'];?></td>
            <td><?php echo $pecah['jumlah'];?></td>
            <td>
                <?php echo $pecah['harga_produk']*$pecah['jumlah'];?>
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
