<?php 
  require 'functions.php';
  session_start(); 

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
  <title>Login</title>
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

  <div class="container-fluid">
    <div class="row h-screen-100 w-100 justify-content-center mx-auto">
      <img src="assets/img/splash.png" class="col-12 mx-auto my-5" alt="splash">
      <div class="col-12 my-1">
        <h3 class="text-center">Mental Health</h3>
      </div>
      <div class="col-12 mt-1 mb-4">
        <p class="fs-7 text-center">Journaling and fitness tracking ur mind</p>
      </div>
      <div class="col-12 mt-1 mb-4 text-center">
        <a href="register.php">
          <button type="button" class="btn btn-dark rounded-pill px-8p">Get Started</button>
        </a>
      </div>
      <div class="col-12 mt-1 mb-4 text-center">
        <p class="fs-6"> Have an account? <a href="login.php">Login</a></p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>