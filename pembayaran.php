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
<div class="col-md-6 offset-md-3">
    <span class="anchor" id="formPayment"></span>
    <hr class="my-5">

    <!-- form card cc payment -->
    <div class="card card-outline-secondary">
        <div class="card-body">
            <h3 class="text-center">Credit Card Payment</h3>
            <hr>
            <div class="alert alert-info">Must Pay <strong>Rp.
                    <?php echo number_format($detpem['total_pembelian'])?></strong></div>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="cc_name">Card Holder's Name</label>
                    <input type="text" name="nama" class="form-control" id="cc_name" pattern="\w+ \w+.*"
                        title="First and last name" required="required">
                </div>
                <div class="form-group">
                    <label>Card</label>
                    <input type="text" name="bank" class="form-control" autocomplete="off" maxlength="20" pattern="\w+"
                        title="Bank" required="required">

                </div>
                <div class="row">
                    <label class="col-md-12">Amount</label>
                </div>
                <div class="form-inline">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                        <input type="number" min="1" name="jumlah" class="form-control text-right"
                            id="exampleInputAmount" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Reception</label>
                    <input type="file" name="bukti" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-6">
                        <button type="reset" class="btn btn-default btn-lg btn-block">Cancel</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="kirim" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </div>
                </div>
            </form>
        </div>
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
        echo "<script>alert('Payment Confirmation is being processed.')</script>";
        echo "<script>location='history.php';</script>";
    }
?>
    </body>

    </html>