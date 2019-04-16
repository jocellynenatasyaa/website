<h2>Product Data</h2>

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
            <td><img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100"></td>
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