<?php
    session_start();
    include 'koneksi.php';
    include 'navbar.php';

    $idpem=$_GET['id'];
    $ambil = $conn->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian where pembelian.id_pembelian='$idpem'");
    $detpem = $ambil->fetch_assoc();

    if(empty($detpem))
    {
        echo "<script>alert('Your're not allowed);</script>";
        echo "<script>location='history.php';</script>";
        exit();
    }

    $id_pelanggan_beli = $detpem['id_pelanggan'];
    $id_pelanggan_login = $_SESSION['tbuser']['username'];

    if($id_pelanggan_login!==$id_pelanggan_beli)
    {
        echo "<script>alert('Your're not allowed);</script>";
        echo "<script>location='history.php';</script>";
        exit();
    }
?>
<br><br><br>

<div class="container">
  <h2>Payment</h2>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                        <tr>
                            <th>Card Holder's Name</th>
                            <td><?php echo $detpem['nama'];?></td>
                        </tr>
                        <tr>
                            <th>Card</th>
                            <td><?php echo $detpem['bank'];?></td>
                        </tr>
                        <tr>
                            <th>Charge for</th>
                            <td>Rp. <?php echo number_format($detpem['jumlah']);?></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><?php echo $detpem['tanggal'];?></td>
                        </tr>
                
                </table>
            </div>
            <div class="col-md-6">
                <img width="500" src="bukti_pembayaran/<?php echo $detpem['bukti'];?>" alt="" class="img-responsive">
            </div>
        </div>
    </div>
</body>
</html>