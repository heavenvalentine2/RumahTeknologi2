<?php
session_start();
require 'functions.php';

if (isset($_SESSION["login"])) {
  redirect('index.php');
}

?>

<?php $title = "Login Form";
require "header.php"; ?>

<body>
  <div class="container">
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
        <div class="row h-screen-60 w-100 justify-content-center float-left">
          <div class="col-12 mt-5">
            <h1 class="float-start title">Let's sign you in</h1>
          </div>

          <div class="col-12 mt-1">
            <p>
              Welcome back,
              you've been missed! 🎊
            </p>
          </div>

          <div class="col-12 mt-2">
            <form action="login_process.php" method="post">
              <div class="mb-3">
                <label for="NIS" class="form-label">NIS address</label>
                <input type="text" class="form-control" id="NIS" name="NIS" require>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" require>
              </div>
              <button type="submit" id="submit" name="submit" class="btn btn-dark w-100 mt-3">Login</button>
            </form>
          </div>

          <div class="col-12 mt-3 mb-4 text-center">
            <p class="fs-6"> Don't have an account? <a href="register.php" class="">Register</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <footer class="container mt-5 text-center">
    <div class="icon-container">
      <h5>Contributor's</h5>
      <br>
      <img src="photo/default-profile.jpg" class="rounded-circle img-thumbnail" alt="" width="50" height="50">
      <img src="photo/default-profile.jpg" class="rounded-circle img-thumbnail" alt="" width="50" height="50">
      <img src="photo/default-profile.jpg" class="rounded-circle img-thumbnail" alt="" width="50" height="50">
      <img src="photo/default-profile.jpg" class="rounded-circle img-thumbnail" alt="" width="50" height="50">
    </div>

  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
<?php
session_unset();
session_destroy();
?>

</html>