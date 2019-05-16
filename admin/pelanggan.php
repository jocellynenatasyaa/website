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

<script>
    $(document).ready(function () {
        $('.toast').toast('show');

    });
</script>   