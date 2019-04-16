<h2>Update Product</h2>
<?php
    $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $pecah=$ambil->fetch_assoc();

    
?>
<form method="post" enctype="multipart/form-data">
    <div class=form-group>
        <label>Product Name</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk'];?>">
    </div>
    <div class=form-group>
        <label>Price (RP)</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk'];?>">
    </div>
    <div class=form-group>
        <label>Weight (Gr)</label>
        <input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat_produk'];?>">
    </div>
    <div class=form-group>
        <label>Description</label>
        <textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi_produk'];?></textarea>
    </div>
    <div class=form-group>
        <img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100">
    </div>
    <div class=form-group>
        <label>Photo</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button class="btn btn-primary" name="ubah">Update</button>
</form>
<?php
if (isset($_POST['ubah']))
{
    $nama = $_FILES['foto']['name'];
    $lokasi =$_FILES['foto']['tmp_name'];

    if (!empty($lokasi))
    {    
    move_uploaded_file($lokasi, "../foto_produk/".$nama);
    
    $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', 
    berat_produk='$_POST[berat]', foto_produk='$nama', deskripsi_produk='$_POST[deskripsi]' 
    WHERE id_produk='$_GET[id]'"); 
    }
    else 
    {
    $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', 
    berat_produk='$_POST[berat]', deskripsi_produk='$_POST[deskripsi]' 
    WHERE id_produk='$_GET[id]'"); 
    }
    echo "<div class='alert alert-info'>Data Updated</div>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>
