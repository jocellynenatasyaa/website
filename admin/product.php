<?php
error_reporting(0);
    $toast = $_GET['toast'];
    if($toast == 1){
        ?>        
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay=5000 data-autohide="true">
            <div class="toast-header">
                <div class='bg-success rounded mr-2' style="padding:10px"></div>
                <strong class="mr-auto">Aphrodite Admin</strong>
                <small>Just Now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Data added
            </div>
        </div>
        <?php

    }
?>
<h2 class="display-4">Product Data</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Weight</th>
            <th>Photo</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nomor=1;
        ?>
        <?php 
            $ambil = $koneksi->query("SELECT * FROM produk");
        ?>
        <?php
            while($pecah = $ambil->fetch_assoc()){
        ?>
    <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama_produk'];?></td>
            <td><?php echo $pecah['harga_produk'];?></td>
            <td><?php echo $pecah['berat_produk'];?></td>
            <td style="max-width:100px;max-height:100px">
                <?php
                    echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $pecah['foto_produk'] ).'"/>';
                ?>
            </td>
            <td><?php echo $pecah['deskripsi_produk'];?></td>
            <td>
                <a href="index.php?halaman=hapusproduct&id=<?php echo $pecah['id_produk'];?>" class="btn-danger btn">Delete</a>
                <a href="index.php?halaman=ubahproduct&id=<?php echo $pecah['id_produk'];?>" class="btn-warning btn">Update</a>
            </td>
        </tr>
        <?php
            $nomor++;
        ?>
        <?php
            }
        ?>
    </tbody>
</table>
<a href="index.php?halaman=addproduct" classbtn btn-primary> Add Data</a>

<script>
    $( document ).ready(function() {
  $('.toast').toast('show');
  
});
</script>