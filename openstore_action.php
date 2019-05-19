
<?php
 session_start();

 include 'navbar.php';
?>



  <br><br><br>
  <br>
  <br>
  <br>
  <div class="container text-center">
  <div class="col-3 m-auto">

  <?php
  error_reporting(0);
  include 'koneksi.php';
  $username = $_SESSION['username'];

  $search = "select * from store  where username = '$username'";
  $querySearch = mysqli_query($conn,$search);
  $row = mysqli_num_rows($querySearch);
  // echo $search;
  // echo $row;
  if($row < 1){
    $storename = $_POST['name'];
    $city = $_POST['city'];
    $phone_number = $_POST['number'];
    // echo $_POST['image'];
    $img = $_FILES['image']['tmp_name'];
    $image = addslashes(file_get_contents($img));

    $sql = "insert into tempstore (store_name,city,image,username,phone_number) values('$storename','$city','$image','$username','$phone_number')";
    $query = mysqli_query($conn,$sql);

?>
  <img class="img-fluid" src="images/checked.png" alt="checked">
    <h1 class="display-4 text-success">Success</h1>
    <p class="lead">
        Wait for the admin to confirm your store.
    </p>
<?php
  }else{

  
?>
  <img class="img-fluid" src="images/no-entry.png" alt="checked">
  <br>
    <p class="lead text-danger mt-3">
        You Have A Store
    </p>
<?php
  }
  
?>
    
  </div>
  </div>
</body>
</html>