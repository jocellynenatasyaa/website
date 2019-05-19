
  <?php 
  session_start();
  $_GET['msg'];
  include 'navbar.php' ?>

  <div class="container mt-5">
  <br>
    <h1 class="display-4 text-center">Store Information</h1>
  
  <div class="row py-5">
    <div class="col-md-5">
      <img src="img/store.png" class="img-fluid" alt="">
    </div>
    <div class="col-md-7">
      <div class="card">
      <div class="card-body">
        <h5 style="font-size: 1.2rem" class="card-title display-4">Hello  , <span  class="text-uppercase"><?php
                                  echo $_SESSION['username'];
                              ?></span></h5>
        <h6 class="card-subtitle mb-2 text-muted">Welcome to Aphrodite, let's open store now.</h6>
        <br>
        <form action="openstore_action.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1" require>Store Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your store name">
          </div>
          <div class='form-group'>
          <label for="number" require>Phone Number</label>
            <input type="text" class="form-control" name="number" id="number" aria-describedby="emailHelp" placeholder="Enter your store name">
          </div>
          <div class="form-group">
            <label for="yourCity">Your City</label>
            <select class="form-control" name="city" id="yourCity">
              <option value="Sambas">Sambas</option>
              <option value="Mempawah">Mempawah</option>
              <option value="Sanggau">Sanggau</option>
              <option value="Ketapang">Ketapang</option>
              <option value="Sintang">Sintang</option>
              <option value="Kapuas Hulu">Kapuas Hulu</option>
              <option value="Bengkayang">Bengkayang</option>
              <option value="Landak">Landak</option>
              <option value="Sekadau">Sekadau</option>
              <option value="Melawi">Melawi</option>
              <option value="Kayong Utara">Kayong Utara</option>
              <option value="Kubu Raya">Kubu Raya</option>
              <option value="Pontianak">Pontianak</option>
              <option value="Singkawang">Singkawang</option>
            </select>
          </div>
          <div class="form-group">
            <div class="row">
            <div class="col-6">
            <img src="images/camera.png" id="imageThumbnail" class="img-fluid img-thumbnail" alt="">
            
            </div>
            <div class="col-6">
              <label for="image">Browse Image</label>
              <input name="image" type="file" accept="image/*" class="form-control-file" id="image" onchange="readURL(this);">

            </div>
            </div>
            
          </div>
          <button type="submit" class="btn btn-success">Open Your Store</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
</body>
<script>
  function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#imageThumbnail')
					.attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
</html>