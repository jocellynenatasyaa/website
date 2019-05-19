<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
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
                <a class="nav-link active" href="index.php?halaman=customers">
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
        <?php
            echo $_GET['halaman'];
        ?>
    </h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nomor=1;
        ?>
        <?php 
            $ambil = $koneksi->query("SELECT * FROM tbuser");
        ?>
        <?php
            while($pecah = $ambil->fetch_assoc()){
        ?>
    <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['nama'];?></td>
            <td><?php echo $pecah['email'];?></td>
            <td><?php echo $pecah['telepon'];?></td>
            <td>
                <a href="" class="btn-danger btn">Delete</a>
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
</main>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<h2 class="display-4 text-capitalize">
       Confirm Store
    </h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Store Name</th>
            <th>City </th>
            <th>Image</th>
            <th>Username</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nomor=1;
        ?>
        <?php 
            $ambil = $koneksi->query("SELECT * FROM tempstore");
        ?>
        <?php
            while($pecah = $ambil->fetch_assoc()){
                $notemp = $pecah['notemp'];
                $store_name = $pecah['store_name'];
                $city = $pecah['city'];
                $image = $pecah['image'];
                $username = $pecah['username'];
                $phone_number = $pecah['phone_number'];
        ?>
    <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['store_name'];?></td>
            <td><?php echo $pecah['city'];?></td>
            <td class="text-center">
            <?php 
                echo '<img style="max-width:100px" src="data:image/jpeg;base64,'.base64_encode( $pecah['image'] ).'"/>';
            ?>
            </td>
            <td><?php echo $pecah['username'];?></td>
            <td><?php echo $pecah['phone_number'];?></td>
            <td>
                <a onclick="f_verification(<?php echo "'$notemp','$store_name','$city','$username','$phone_number'" ?>)" href="#" class="btn-primary btn">Verification</a>
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
</main>

<script>
    $(document).ready(function () {
        $('.toast').toast('show');

    });
    function f_verification(notemp,store_name,city,image,username,phone_number){
        url = "verification.php?notemp="+notemp+"&store_name="+store_name+"&city="+city+"&image="+image+"&username="+username+"&phone_number="+phone_number;
        location.href = url;
    }
</script>   