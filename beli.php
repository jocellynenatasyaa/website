<?php
session_start();
//mendapatkan id_produk dari url
$id_produk = $_GET['id'];
//if sudah ada produk dikeranjang, maka jumlah produk +1
if(isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk]+=1;
}
//selain itu (blm ada dikeranjang), maka produk itu dianggap beli 1
else 
{
    $_SESSION['keranjang'][$id_produk]=1;
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
//larikan ke halaman keranjang]
echo "<script>location='cart.php'</script>"
?>