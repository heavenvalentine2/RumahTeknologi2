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
  <link rel="stylesheet" href="assets/css/decor.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="manifest" href="manifest.json" />
  <script src="assets/js/script.js"></script>
</head>

<body>

  <div class="container-fluid">
  <div class="row">
      <div class="col-md-4 offset-md-4 mt-5">
        <div class="row h-screen-60 w-100 justify-content-center mx-auto">
        <div class="col-12 mt-5 mt-1">
        <h1 class="text-center title mb-5">Kenali Dirimu</h1>

        <div class="progress">
            <div class="progress-bar bg-info" id="progress-bar" role="progressbar" aria-label="Success example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>

        <div class="progressNo">
        <p class="progress-number fs-" role="progressno" style="font-size:0.7rem;" id="progress-number"></p>
        </div>

        <div class="quiz" id="quiz"></div>

        <div class="buttons" id="buttons">
            <button type="button" id="submit" class="btn btn-dark mt-4">Submit</button>
            <button type="button" id="restart" class="btn btn-dark mt-4">Restart</button>
        </div>

        </div>
        </div>
      </div>
<!-- 
      <div id="quiz-container">
      <h1>Quiz App</h1>
      <div id="progress-bar-container">
        <div id="progress-bar"></div>
      </div>
      <div id="quiz"></div>
      <div id="buttons">
        <button id="submit">Submit</button>
        <button id="restart">Restart</button>
      </div>
    </div> -->
  </div>
  </div>


  </div>

  <!-- Bootstrap JS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
  <script src="script.js"></script>
</body>

</html>