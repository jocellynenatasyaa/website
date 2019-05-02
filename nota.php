<?php
    session_start();
   include 'koneksi.php';
   include 'navbar.php';
?>

    <!-- Content -->
    <section class="konten mt-3">
        <div class="container">
            <h2>Purchasing Detail</h2>
            <?php
                $ambil = $conn->query("SELECT * FROM pembelian JOIN tbuser ON pembelian.id_pelanggan=tbuser.username WHERE pembelian.id_pembelian='$_GET[id]'");
                $detail = $ambil->fetch_assoc();
            ?>
            <?php
                $idpelangganyangbeli = $detail['id_pelanggan'];
                $idpelangganyanglogin = $_SESSION['tbuser']['username'];

                if($idpelangganyangbeli!==$idpelangganyanglogin)
                {
                    echo "<script>You're not allowed to open others</script>";
                    echo "<script>location='history.php'</script>";
                    exit();
                }
            ?>
            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>No. Pembelian: <?php echo $detail['id_pembelian']?></strong><br>
                    <p>
                        Tanggal: <?php echo $detail['tanggal_pembelian'];?> <br>
                        Total: <?php echo number_format($detail['total_pembelian']);?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong><?php echo $detail['nama'];?></strong><br>
                    <p>
                        <?php echo $detail['telepon'];?> <br>
                        <?php echo $detail['email'];?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?php echo $detail['nama_kota'];?></strong><br>
                    Ongkos Kirim: Rp. <?php echo number_format($detail['tarif'])?><br>
                    Alamat: <?php echo $detail['alamat']?>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor=1;
                    ?>
                    <?php 
                        $totalbelanja=0;
                        $sql = "SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'";
                        $ambil = $conn->query($sql);
                    ?>
                    <?php
                        while($pecah = $ambil->fetch_assoc()){
                            $jumlah = $pecah['jumlah'];
                            $subharga = $pecah['harga']*$jumlah;
                    ?>
                <tr>
                        <td><?php echo $nomor;?></td> 
                        <td><?php echo $pecah['nama'];?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']);?></td>
                        <td><?php echo $pecah['berat'];?> Gr.</td>
                        <td><?php echo $pecah['jumlah'];?></td>
                        <td>Rp. <?php echo number_format($pecah['subharga']);?></td>
                        
                    </tr>
                    <?php
                        $nomor++;
                        $totalbelanja+=$subharga;
                    ?>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <th colspan="5">Total</th>
                    <th>Rp. <?php echo number_format($detail['total_pembelian'])?></th>
                </tfoot>
                <tfoot>
                        <th colspan="5">Subtotal</th>
                        <th>Rp. <?php echo number_format($totalbelanja)?></th>
                </tfoot>
            </table>
            <?php
                
            ?>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                    <p>Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']);?>
                    ke <br> 
                    <strong>
                        BANK BCA 778-9936290-2280 AN. Aphrodite
                    </strong>
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>