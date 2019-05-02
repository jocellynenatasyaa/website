<?php
    session_start();
    include 'koneksi.php';
    $id_produk = $_GET['id'];
    $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $detail = $ambil->fetch_assoc();
    include 'navbar.php';
?>
<section class="kontent">
        <div class="container" style="margin-top:70px;">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $detail['foto_produk'] ).'"/>';
                ?>
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail['nama_produk']?></h2>
                    <h4>Rp. <?php echo number_format($detail['harga_produk']);?></h4>

                    <form method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" name="jumlah" min="1" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['beli']))
                        {
                            $jumlah = $_POST['jumlah'];
                            $_SESSION['keranjang'][$id_produk] = $jumlah;
                            echo "<script>location='cart.php';</script>";
                        }
                    ?>
                    <p><?php echo $detail['deskripsi_produk']?></p>
                </div>
            </div>
        </div>
    </section>