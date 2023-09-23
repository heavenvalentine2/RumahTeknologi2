  <?php
  session_start();
  require 'functions.php';

  if (isset($_SESSION["login"])) {
    redirect('index.php');
  }
  ?>

  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/decor.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="manifest" href="smanifest.json" />
    <script src="assets/js/script.js"></script>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 offset-md-4 mt-5">

          <?php
          if (isset($_SESSION['error'])) {
          ?>
            <div class="alert alert-warning" role="alert">
              <?php echo $_SESSION['error'] ?>
            </div>
          <?php
          }
          ?>
          <?php
          if (isset($_SESSION['message'])) {
          ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_SESSION['message'] ?>
            </div>
          <?php
          }
          ?>

          <div class="row h-screen-60 w-100 justify-content-center mx-auto">
            <div class="col-12 mt-5">
              <h1 class="text-center title">Register</h1>
            </div>
            <div class="col-12 mt-5">
              <form action="register_process.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="NIS" class="form-label">NIS</label>
                  <input type="text" class="form-control" id="NIS" name="NIS" required>
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select" id="gender" name="gender" aria-label="Default select example" required>
                    <option selected disabled>Select one</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                  <label for="password2" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="password2" name="password2" required>
                </div>
                <div class="mb-3">
                  <label for="student_card" class="form-label">Student Card</label>
                </div>
                <div id="webcam-container" class="mb-3 text-center d-flex flex-column align-items-center justify-content-center">
                  <video id="webcam" width="320" height="240" autoplay style="display: block;"></video>
                  <canvas id="canvas" width="320" height="240" style="display: none;"></canvas>
                  <div class="d-flex justify-content-center mt-2">
                    <button type="button" class="btn btn-dark mx-1" id="capture-btn">Capture</button>
                    <button type="button" id="retry-btn" class="btn btn-dark mx-1" style="display: none;">Retry</button>
                  </div>
                </div>
                <input type="hidden" name="image_data" id="image-data">
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="termsCheck" required>
                  <label class="form-check-label" for="termsCheck">
                    I agree to the <a href="terms_and_conditions.html" target="_blank">Terms and Conditions</a>
                  </label>
                  <button type="submit" class="btn btn-dark w-100 mt-3 mb-4" id="daftar-btn">Register</button>
                </div>
              </form>
              <div class="mt-4 text-center">
                Already registered? <bold><a href="login.php">Login</a></bold>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        const nameInput = document.getElementById('name');
        const captureButton = document.getElementById('capture-btn');
        const retryButton = document.getElementById('retry-btn');
        const imageDataInput = document.getElementById('image-data');
        const daftarButton = document.getElementById('daftar-btn');
        const webcamElement = document.getElementById('webcam');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');

        navigator.mediaDevices.getUserMedia({
            video: true
          })
          .then(stream => {
            webcamElement.srcObject = stream;
          })
          .catch(error => {
            console.error('Error mengakses webcam: ', error);
          });

        captureButton.addEventListener('click', () => {
          context.drawImage(webcamElement, 0, 0, 320, 240);
          const imageData = canvas.toDataURL('image/jpeg');
          imageDataInput.value = imageData;

          webcamElement.style.display = 'none';
          canvas.style.display = 'block';
          captureButton.style.display = 'none';
          retryButton.style.display = 'block';
        });

        retryButton.addEventListener('click', () => {
          webcamElement.style.display = 'block';
          canvas.style.display = 'none';
          captureButton.style.display = 'block';
          retryButton.style.display = 'none';
          imageDataInput.value = '';

          context.clearRect(0, 0, canvas.width, canvas.height);
        });

        daftarButton.addEventListener('click', () => {
          document.getElementById('registration-form').removeEventListener('submit', preventFormSubmission);
        });

        function preventFormSubmission(event) {
          event.preventDefault();
        }

        document.getElementById('registration-form').addEventListener('submit', preventFormSubmission);
      </script>

  </body>
  <?php
  session_unset();
  session_destroy();
  ?>

  </html>