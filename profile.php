<?php
session_start();
include 'koneksi.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>
<style>
    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: 100%;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: 0%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 0%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }
</style>

<body>
    <div class="container emp-profile" style="margin-top:75px; box-shadow: 0 0 1px 0;">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                            alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
                        </div>
                        <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                        <?php echo $_SESSION["tbuser"]['nama']?> 
                        </h5>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true" style="color:grey;">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false" style="color:grey;">Timeline</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                <div class="col-md-10">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION["tbuser"]['username']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION["tbuser"]['nama']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION["tbuser"]['email']?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION["tbuser"]['telepon']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                            <?php
                            include 'koneksi.php';
                            $username = $_SESSION['username'];
                                $ambil = $conn->query("SELECT * FROM produk WHERE post='$username'");
                                while ($perproduk = $ambil->fetch_assoc()){
                            ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <?php
                                echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $perproduk['foto_produk'] ).'"/>';
                            ?>
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $perproduk['nama_produk'];?></h3>
                                        <p class="card-text"><?php echo $perproduk['deskripsi_produk'];?></p>
                                        <h5 class="card-subtitle">Rp. <?php echo number_format($perproduk['harga_produk']);?></h5>
                                        <br>
                                        <a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Buy</a>
                                        <a href="description.php?id=<?php echo $perproduk['id_produk'];?>"
                                            class="btn btn-default">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                } 
                            ?>
                        </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
                </div>
            </div>
            
        </form>
    </div>
</body>

</html>