<?php
    include 'conn.php';
    
    $my_select = "select * from produk";
    $my_query = mysqli_query($conn,$my_select);
    
    if(mysqli_num_rows($my_query) > 0){
        $response = array();
        $response["produk"] = array();
        while($x = mysqli_fetch_array($my_query)){
            $blob_image = $x["foto_produk"];
            file_put_contents('../api/gambar_produk/'.$x["id_produk"].'product.png', $blob_image);
            $imageURL = "http://localhost/website/api/gambar_produk/".$x["id_produk"].'product.png';
            $h['id_produk'] = $x["id_produk"];
            $h['nama_produk'] = $x["nama_produk"];
            $h['harga_produk'] = $x["harga_produk"];
            $h['foto_produk'] = $imageURL;
            $h['berat_produk'] = $x["berat_produk"];
            $h['deskripsi_produk'] = $x["deskripsi_produk"];
            array_push($response["produk"], $h);
        }
        $fp = fopen('../api/json_result.json','w');
        fwrite($fp,json_encode($response));
        fclose($fp);
    }
    else
    {
        echo "tidak ada data";
    }


?>