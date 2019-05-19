<?php
    session_start();
    include 'koneksi.php';
    include 'navbar.php';
    $search = $_GET['search'];

    $data=array();
    $ambil = $conn->query("SELECT * FROM produk WHERE nama_produk LIKE '%$search%'
        OR deskripsi_produk LIKE '%$search%' OR hastag LIKE '%$search%'");
    while($pecah = $ambil->fetch_assoc())
    {
        $data[]=$pecah;
    }
    
?>

    <div class="container" style="margin-top:70px;">
        <h3>Hasil Pencarian : <?php echo $search;?></h3>
        <?php
            if(empty($data)):
                ?>
                <div class="alert alert-danger">Pencarian tidak ditemukan</div>
            <?php endif
        ?>
        
        <div class="row">
            <?php
                foreach ($data as $key => $value):
            ?>
            <div class="col-md-3">
                <div class="card">
                <?php
                    echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $value['foto_produk'] ).'"/>';
                ?>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $value['nama_produk'];?></h3>
                        <p class="card-text"><?php echo $value['deskripsi_produk'];?></p>
                        <h5 class="card-subtitle">Rp. <?php echo number_format($value['harga_produk']);?></h5>
                        <br>
                        <a href="beli.php?id=<?php echo $value['id_produk'];?>" class="btn btn-primary">Beli</a>
                        <a href="detail.php?id=<?php echo $value['id_produk'];?>"
                            class="btn btn-default">Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>