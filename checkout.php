<?php
session_start();
include 'koneksi.php';
include 'navbar.php';
?>

    <section class="konten">
  <div class="container">
    <h1>Checkout</h1>
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $nomor=1;
        $totalbelanja=0;
        
        foreach($_SESSION['keranjang'] as $id_produk => $jumlah):
        $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $pecah = $ambil->fetch_assoc();
        $subharga = $pecah['harga_produk']*$jumlah;
        ?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk'];?></td>
            <td>Rp.<?php echo number_format($pecah['harga_produk']);?></td>
            <td><?php echo $jumlah;?></td>
            <td>Rp. <?php echo number_format($subharga);?></td>
        </tr>
        <?php
        $nomor++;
        $totalbelanja+=$subharga;
        endforeach
        ?>
      </tbody>
      <tfoot>
            <th colspan="4">Total</th>
            <th>Rp</th>
      </tfoot>
      <tfoot>
            <th colspan="4">Subtotal</th>
            <th>Rp. <?php echo number_format($totalbelanja)?></th>
      </tfoot>
    </table>
    <form method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <input type="text" readonly value="<?php echo $_SESSION["tbuser"]['nama']?>" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <input type="text" readonly value="<?php echo $_SESSION["tbuser"]['telepon']?>" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                
                    <select name="id_ongkir" class="form-control">
                        <option value="">Pilihan Pengiriman</option>
                        <?php
                            $ambil = $conn->query("SELECT * FROM ongkir");
                            while($perongkir = $ambil->fetch_assoc())
                            {
                                ?>
                                <option value="<?php echo $perongkir['id_ongkir']?>">
                                <?php echo $perongkir['nama_kota']?> -
                                Rp. <?php echo number_format($perongkir['tarif'])?>
                                </option>
                        <?php
                            }
                        ?>
                    </select>
            </div>
        </div>
        <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap (Beserta Kode Pos)"></textarea>
            </div>
        <button class="btn btn-primary" name="checkout">Checkout</button>
    </form>
    <?php
    if(isset($_POST['checkout']))
    {
        $id_pelanggan = $_SESSION['tbuser']['username'];
        $id_ongkir = $_POST['id_ongkir'];
        $tanggal_pembelian = date("Y-m-d");
        $alamat = $_POST['alamat'];

        $ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
        $arrayongkir = $ambil->fetch_assoc();
        $nama_kota = $arrayongkir['nama_kota'];
        $tarif = $arrayongkir['tarif'];

        $total_pembelian = $totalbelanja + $tarif;

        $conn->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat)
        VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat')");

        $id_pembelian_barusan = $conn->insert_id;
    
        foreach($_SESSION['keranjang'] as $id_produk => $jumlah)
        {
            $ambil=$conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
            $perproduk = $ambil->fetch_assoc();

            $nama = $perproduk['nama_produk'];
            $harga = $perproduk['harga_produk'];
            $berat = $perproduk['berat_produk'];

            $subberat = $perproduk['berat_produk']*$jumlah;
            $subharga = $perproduk['harga_produk']*$jumlah;
            $conn->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
            VALUES('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");
        
            $conn->query("UPDATE produk SET stok=stok-$jumlah WHERE id_produk='$id_produk'");
        }
        unset ($_SESSION['keranjang']);
        echo "<script>alert('pembelian sukses');</script>";
        echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
    }
    ?>
    
  </div>
</section>

</body>
</html>