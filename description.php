<?php
    session_start();
    include 'koneksi.php';
    $id_produk = $_GET['id'];
    $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $detail = $ambil->fetch_assoc();
    include 'navbar.php';
?>

    <br>
	<br>
	<br>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12"><?php
                    echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $detail['foto_produk'] ).'"/>';
                ?></div>
			</div>
		</div>

		<div class="col-md-4">
            <form method="POST">
            <h2><?php echo $detail['nama_produk']?></h2>
            <h4>Rp. <?php echo number_format($detail['harga_produk']);?></h4>
			<h5>Stok: <?php echo $detail['stok'];?></h5>
					<div class="form-group">
					    <div class="btn-group">
							    <button type="button" class="btn btn-secondary">Select Size</button>
							    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"> </button>
					   		<div class="dropdown-menu">
						      <a class="dropdown-item" href="#">S</a>
						      <a class="dropdown-item" href="#">M</a>
						      <a class="dropdown-item" href="#">L</a>
						      <a class="dropdown-item" href="#">XL</a>
					    	</div>
				  		</div>
			    	</div>
			    	<br>
			    	 <div class="checkbox">
      <label><input type="checkbox" value="">Wrap up as gift</label>
    </div><br>
				<label for="comment">Note:</label>
     				<textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                     <br>
                     <input type="number" name="jumlah" min="1" max="<?php echo $detail['stok'];?>" class="form-control col-md-2" value="1">
                     <br>
			    <button class="btn btn-primary" name="beli">Buy</button>
			  </form>
              <?php
                        if(isset($_POST['beli']))
                        {
                            $jumlah = $_POST['jumlah'];
                            $_SESSION['keranjang'][$id_produk] = $jumlah;
                            echo "<script>location='cart.php';</script>";
                        }
                    ?>
		</div>
	</div>
</div>
</body>
</html>