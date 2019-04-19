<h2>Add Product</h2>
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
    move_uploaded_file($lokasi, "../foto_produk/".$nama);
    $koneksi->query("INSERT INTO produk(nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk) 
    VALUES('$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$image', '$_POST[deskripsi]')");
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk&toast=1'>";
}
?>
