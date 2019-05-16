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


<h2 class="display-4 text-capitalize">
        Add Product
</h2>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Price (RP)</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label>Weight (Gr)</label>
        <input type="number" class="form-control" name="berat">
    </div>
    <div class="form-group">
        <label>Stock</label>
        <input type="number" class="form-control" name="stok" min="1">
    </div>
    <div class="form-group">
        <label>Category</label>
        <?php
            
            $query ="SELECT * FROM kategori";
            $result = mysqli_query($koneksi,$query);
        ?>
        <select name="kategori">
        <?php while($data = mysqli_fetch_assoc($result) ){?>
            <option value="<?php echo $data['nama'];?>"><?php echo $data['nama'];?></option>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Photo</label>
        <input id="imgInp" accept="image/*" type="file" class="form-control-file" name="foto">
        <div style="width:200px;height:200px;" class="m-2">
        <img id="imgPreview" width="200" height="200" src="img/preview.png" alt="">
        </div>
        
    </div>
    <button class="btn btn-primary" name="save">Save</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

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
<?php
if (isset($_POST['save']))
{   

    $img = $_FILES['foto']['tmp_name'];
    $image = addslashes(file_get_contents($img));
    $koneksi->query("INSERT INTO produk(nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk, stok, kategori) 
    VALUES('$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$image', '$_POST[deskripsi]','$_POST[stok]','$_POST[kategori]')");
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=product&toast=1&msg=added'>";
}
?>
</main>

<script>
    $(document).ready(function () {
        $('.toast').toast('show');

    });
</script>
