<?php
    session_start();
    include 'koneksi.php';
    include 'navbar.php';
?>
<br><br><br>

<!--Content-->
<section class="riwayat">
    <div class="container">
        <h3>Shopping List <?php echo $_SESSION['tbuser']['nama']?></h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Charge for</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $nomor=1;
                    $username = $_SESSION['tbuser']['username'];
                    $ambil=$conn->query("SELECT * FROM pembelian WHERE id_pelanggan='$username'");
                    while($pecah=$ambil->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $pecah['tanggal_pembelian']?></td>
                    <td>
                        <?php echo $pecah['status']?>
                        <br>
                        <?php if (!empty($pecah['resi'])):?>
                        Resi: <?php echo $pecah['resi'];?>
                        <?php endif ?>
                    </td>
                    <td>Rp. <?php echo number_format($pecah['total_pembelian'])?></td>
                    <td>
                        <a href="nota.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-info">Note</a>
                        <?php if ($pecah['status']=='Belum Bayar'):?>
                        <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">Input
                            Payment</a>
                        <?php else : ?>
                        <a href="lihatpembayaran.php?id=<?php echo $pecah['id_pembelian']?>"
                            class="btn btn-warning">Open Payment</a>
                        <?php endif ?>

                    </td>
                </tr>
                <?php
                    $nomor++;
                    }
                    ?>
            </tbody>
        </table>
    </div>
</section>