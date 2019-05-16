<?php
if (isset($_POST['save']))
{   

    $img = $_FILES['foto']['tmp_name'];
    $image = addslashes(file_get_contents($img));
    $koneksi->query("INSERT INTO produk(nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk) 
    VALUES('$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$image', '$_POST[deskripsi]')");
    echo "<meta http-equiv='refresh' content='1;url=profile.php'>";
}
?>