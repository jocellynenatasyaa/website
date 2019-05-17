
  <?php 
  session_start();
  include 'navbar.php' ?>

  <div class="container mt-5">
  <div class="row py-5">
    <div class="col-md-6">
      <img src="img/store.png" class="img-fluid" alt="">
    </div>
    <div class="col-md-6">
      <div class="card">
      <div class="card-body">
        <h5 style="font-size: 1.2rem" class="card-title display-4">Hello, <span  class="text-uppercase"><?php
                                  echo $_SESSION['username'];
                              ?></span></h5>
        <h6 class="card-subtitle mb-2 text-muted">Welcome to Aphrodite, let's open store now.</h6>
        <br>
        <form action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Store Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your store name">
          </div>
          <button type="submit" class="btn btn-success">Open Your Store</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  

    
  </div>
</body>
</html>