<?php
    session_start();
    include 'koneksi.php';
    include 'navbar.php';

    $idpem=$_GET['id'];
    $ambil = $conn->query("SELECT * FROM pembelian where id_pembelian='$idpem'");
    $detpem = $ambil->fetch_assoc();

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
  <h2>Konfirmasi Pembayaran</h2>
  <p>Kirim bukti pembayaran anda disini</p>
  <div class="alert alert-info">Total tagihan anda <strong>Rp. <?php echo number_format($detpem['total_pembelian'])?></strong></div>

  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Penyentor</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
        <label>Bank</label>
        <input type="text" name="bank" class="form-control">
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="number" min="1" name="jumlah" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto Bukti</label>
        <input type="file" name="bukti" class="form-control">
    </div>
    <button class="btn btn-primary" name="kirim">Kirim</button>
  </form>
</div>
<?php
    if (isset($_POST['kirim']))
    {
        $namabukti = $_FILES['bukti']['name'];
        $lokasibukti = $_FILES['bukti']['tmp_name'];
        $namafiks = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");

        $conn->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
        VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

        $conn->query("UPDATE pembelian SET status='Sudah Dibayar' WHERE id_pembelian='$idpem'");
        echo "<script>alert('Konfirmasi Pembayaran Sedang di proses')</script>";
        echo "<script>location='history.php';</script>";
    }
?>
</body>
</html>