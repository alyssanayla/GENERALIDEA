<?php
require_once "../config/config.php";
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INPUT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../assets/css/main.css" rel="stylesheet">
</head>

<body class="body-custom">
  <header id="header" class="header sticky-top">
    <nav class="navbar navbar-custom navbar-expand-lg">
      <div class="container-fluid text-center">
        <div class="col-12">
          <div>
            <a class="navbar-brand" href="#">
              <img src="../assets/img/logonav.png" alt="Bootstrap" width="250" height="60">
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <div class="container pt-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="formcustom col-md-6 rounded-5">
        
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3 mt-3">
            <label class="form-label">CATEGORY</label>
            <select class="form-select" name="id_category">
              <option value=""></option>
              <?php
              $kategori = viewKategori($koneksi);
              if ($kategori != false) {
                foreach ($kategori as $recA) {
              ?>

                  <option value="<?= $recA['id_category'] ?>"><?= $recA['name'] ?></option>

              <?php
                }
              }
              ?>

            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">NAME</label>
            <input class="form-control" type="text" name="name">
          </div>
          <div class="mb-3">
            <label class="form-label">IMAGE</label>
            <input class="form-control" type="file" name="image">
          </div>
          <div class="mb-3">
            <label class="form-label">PRICE</label>
            <input class="form-control" type="number" name="price">
          </div>
          <div class="mb-3">
            <label class="form-label">SIZE</label>
            <select class="form-select" name="size">
              <option value=""></option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
            </select>
          </div>
          <button type="submit" name="submitfashion" class="btn btn-custom mt-4 mb-4">INPUT</button>
        </form>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>