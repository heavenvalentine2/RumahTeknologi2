<?php 
session_start(); 
require '../../functions.php';

if ( !isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit();
} 

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../assets/css/app.css">
  <link rel="stylesheet" href="../../assets/css/decor.css">
  <link rel="manifest" href="../../manifest.json" />
  <script src="../../assets/js/script.js"></script>
</head>

<body>

  <div class="container-fluid px-5 py-2">
    <div class="row mt-4">
      <div class="col-12">
        <h1 class="text-center title">URGENT</h1>
      </div>
      <div class="col-12">
        <a href="urgent-call.php">
          <img src="../../assets/img/radar.gif" class="d-block w-80 mx-auto" alt="...">
        </a>
      </div>
      <div class="col-12">
        <h2 class="text-center p-2 title">
          Hubungi yang kamu butuhkan
        </h2>
      </div>
      <div class="col-12 mt-5 text-center">
        <a href="lapor.php">
          <button type="button" class="btn btn-dark rounded-pill px-4">Lapor tanpa call</button>
        </a>
      </div>
      <div class="col-12 mb-5 mt-3 text-center">
        <a href="../../index.php">
          Kembali
        </a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>