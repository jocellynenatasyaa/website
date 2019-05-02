<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">
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


<h2 class="display-4 text-capitalize">
        <?php
            echo $_GET['halaman'];
        ?>
    </h2>

<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            
            <?php
                    $nomor=1;
                ?>
                <?php 
                    $id_pembelian = $_GET['id'];
                    $ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
                    $detail = $ambil->fetch_assoc();
                ?>
                <?php
                    $nomor++;
                ?>
                <tr>
                    <th>No</th>
                    <td><?php echo $nomor;?></td> 
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $detail['nama'];?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $detail['bank'];?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>Rp. <?php echo number_format($detail['jumlah']);?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><?php echo $detail['tanggal'];?></td>
                </tr>
           
        </table>
    </div>
    <div class="col-md-6">
        <img width="500" src="../bukti_pembayaran/<?php echo $detail['bukti'];?>" alt="" class="img-responsive">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>No Resi Pengiriman</label>
        <input type="text" name="resi" class="form-control">
    </div>
    <div class="form-group">
        <label>Status</label>
            <select name="status" class="form-control">
                <option value="">Pilih Status</option>
                <option value="Lunas">Lunas</option>
                <option value="Barang Dikirim">Barang Dikirim</option>
                <option value="Batal">Batal</option>
            </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php
    if(isset($_POST['proses']))
    {
        $resi = $_POST['resi'];
        $status = $_POST['status'];
        $koneksi->query("UPDATE pembelian SET resi='$resi', status='$status' WHERE id_pembelian='$id_pembelian' ");
        echo "<script>alert('Data pembelian terupdate');</script>";
        echo "<script>location='index.php?halaman=transaction'</script>";
    }
?>
</main>

<script>
    $(document).ready(function () {
        $('.toast').toast('show');

    });
</script>