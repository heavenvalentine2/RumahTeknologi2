<?php 
  session_start();  
  require 'functions.php';

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
  <title>Kenali Dirimu</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="assets/css/decor.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="manifest" href="manifest.json" />
  <script src="assets/js/script.js"></script>
</head>

<body>

  <div class="container-fluid">
  <div class="row">
      <div class="col-md-4 offset-md-4 mt-5">

        <div class="row h-screen-60 w-100 justify-content-center mx-auto">
            <div class="col-12 mt-5">
                <h1 class="text-center title">Kenali Dirimu</h1>
            </div>
            <div class="col-12 mt-5">
            
            </div>

          </div>
        </div>
      </div>
  </div>
  </div>


  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<?php 
  session_unset();
  session_destroy();
?>
</html>