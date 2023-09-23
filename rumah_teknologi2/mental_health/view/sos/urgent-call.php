<?php 
  session_start(); 
  require '../../functions.php';

  if ( isset($_SESSION["login"]) ) 
  {
    redirect('index.php');
  } 
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/app.css">

  <link rel="manifest" href="manifest.json" />
  <script src="assets/js/script.js"></script>
</head>

<body>
  <div class="container-fluid p-0">
    <div class="row mx-0 mb-5 mt-2 gy-3">
      <div class="col-12">
        <a href="index.php" class="link-dark"><i class=" bi bi-arrow-left float-start fs-3"></i></a>
        <h3 class="text-center">CALL</h5>
      </div>
      <div class="col-12">
        <div class="card w-100 p-1 bg-dark">
          <a class="stretched-link" href="tel:+621111111111">
            <img src="https://picsum.photos/id/12/500/200" class="rounded-3 card-img-top w-100" alt="...">
          </a>
          <div class="card-body p-1">
            <p class="card-text text-center text-light">Psikolog</p>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card w-100 p-1 bg-dark">
          <a class="stretched-link" href="tel:+621111111111">
            <img src="https://picsum.photos/id/13/500/200" class="rounded-3 card-img-top w-100" alt="...">
          </a>
          <div class="card-body p-1">
            <p class="card-text text-center text-light">Police</p>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card w-100 p-1 bg-dark">
          <a class="stretched-link" href="tel:+621111111111">
            <img src="https://picsum.photos/id/14/500/200" class="rounded-3 card-img-top w-100" alt="...">
          </a>
          <div class="card-body p-1">
            <p class="card-text text-center text-light">Firefighter</p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>