<?php
session_start();
include 'koneksi.php';
include 'navbar.php';
?>

<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<body>
<section class="konten">
  <div class="container" style="margin-top:75px;">
    <h1>Checkout</h1>
    <hr>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Number</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Amount</th>
          
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
    </table>
    <div class="pull-right">
        <div class="span">
          <div class="alert alert-success">
              <i class="icon-credit-card icon-large"></i>&nbsp;Total:&nbsp;Rp. <?php echo number_format($totalbelanja)?></div>
        </div>
      </div>
    <form method="POST" style="margin-top:100px;">
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
            <option value="">Shipping Service</option>
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
        <label>Complete Address</label>
        <textarea class="form-control" name="alamat"
          placeholder="Enter the full address and postal code"></textarea>
        <label>Alternative Address </label>
        <textarea class="form-control" name="alamat2"
          placeholder="Enter the full address and postal code"></textarea>  
      </div>
      <div class="form-group">
      <div>
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" placeholder="coupon code" name="kupon">
            </div>
            <button class="btn btn-info col-2">
              Use Coupon
            </button>
        </div>
      </div>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" name="checkout">Checkout</button>                     
      </div>
      
    </form>

    
    <?php
    if(isset($_POST['checkout']))
    {
        $id_pelanggan = $_SESSION['tbuser']['username'];
        $id_ongkir = $_POST['id_ongkir'];

        $tanggal_pembelian = date("Y-m-d");
        $alamat = $_POST['alamat'];
        $alamat2 = $_POST['alamat2'];

        $coupon = $_POST['kupon'];

        $search_coupon = "select * from coupon where coupun = '$coupon'";
        echo $search_coupon;
        $querycoupon = mysqli_query($conn,$search_coupon);
        $row = mysqli_num_rows($querycoupon);
        if($row > 0){
          $result2 = mysqli_fetch_array($querycoupon);
          $diskon = $result2['diskon'];
        }
        else{
          $diskon = 0;

        }
      

        $ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
        $arrayongkir = $ambil->fetch_assoc();
        $nama_kota = $arrayongkir['nama_kota'];
        $tarif = $arrayongkir['tarif'];

        $total_pembelian = $totalbelanja + $tarif - $diskon ;

        $conn->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat,alamat2)
        VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat','$alamat2')");

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
        echo "<script>alert('Purchase was successful.');</script>";
        echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
    }
    ?>

  </div>
</section>

</body>

</html>