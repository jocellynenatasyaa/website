<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">
                <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=product">
                <i class="fas fa-tshirt"></i>
                    Product
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=transaction">
                <i class="fas fa-hand-holding-usd"></i>
                    Transaction
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=customers">
                <i class="fas fa-users"></i>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=reports">
                <i class="fas fa-file"></i>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">

                    Integrations
                </a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


<h2 class="display-4 text-capitalize">Update Product</h2>
<?php
    $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $pecah=$ambil->fetch_assoc();

    
?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk'];?>">
    </div>
    <div class="form-group">
        <label>Price (RP)</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk'];?>">
    </div>
    <div class="form-group">
        <label>Weight (Gr)</label>
        <input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat_produk'];?>">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi_produk'];?></textarea>
    </div>
    
    <div class="form-group">
        <label>Photo</label>
        <input type="file" id="imgInp" name="foto" class="form-control-file">
    </div>
    <div class="form-group" style="max-width:200px;max-height:200px">
        <?php
            echo '<img id="imgPreview" class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $pecah['foto_produk'] ).'"/>';
        ?>
    </div>
    <button class="btn btn-warning text-white" name="ubah">Update</button>
</form>
<?php
if (isset($_POST['ubah']))
{
    $img = $_FILES['foto']['tmp_name'];
    $image = addslashes(file_get_contents($img));
    $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', 
    berat_produk='$_POST[berat]', foto_produk='$image', deskripsi_produk='$_POST[deskripsi]' 
    WHERE id_produk='$_GET[id]'"); 
    
    echo "<div class='alert alert-info'>Data Updated</div>";
    echo "<script>location='index.php?halaman=product&toast=1&msg=updated';</script>";
}
?>
</main>

<script>
    $(document).ready(function () {
        $('.toast').toast('show');

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function () {
        readURL(this);
    });
</script>
