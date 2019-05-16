<?php
    $semuadata=array();
    $tglm = "-";
    $tgls = "-";
    if (isset($_POST['kirim']))
    {
        $tglm = $_POST['tglm'];
        $tgls = $_POST['tgls'];
        $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN tbuser pl ON pm.id_pelanggan=pl.username WHERE tanggal_pembelian BETWEEN '$tglm' AND '$tgls'");
        while($pecah = $ambil->fetch_assoc())
        {
            $semuadata[]=$pecah;
        }
    }
?>
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
                <a class="nav-link active" href="index.php?halaman=reports">
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
        from 
        <?php echo $tglm;?> untill <?php echo $tgls;?>
    </h2>

<form method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tglm" class="form-control" value="<?php echo $tglm?>">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tgls" class="form-control" echo="$tgls" value="<?php echo $tgls?>">
            </div>
        </div>
        <div class="col-md-2">
            <label>&nbsp;</label><br>
            <button class="btn btn-primary" name="kirim">Lihat</button>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $total=0;
            
            foreach($semuadata as $key => $value):
                $total+=$value['total_pembelian'];?>
            <tr>
                <td><?php echo $key+1;?></td>
                <td><?php echo $value['nama']?></td>
                <td><?php echo $value['tanggal_pembelian']?></td>
                <td>Rp. <?php echo number_format($value['total_pembelian'])?></td>
                <td><?php echo $value['status']?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <th>Rp. <?php echo number_format($total)?></th>
            </tr>
        </tfoot>
</form>