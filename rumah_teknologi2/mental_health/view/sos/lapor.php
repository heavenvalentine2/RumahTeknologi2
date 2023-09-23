<?php
session_start();
require '../../functions.php';
check_login();

$select = "
  SELECT sos_report.*
  FROM sos_report
  inner join user
  on (sos_report.outgoing_id = user.id)
  WHERE id = " . $_SESSION['id'] . "  
  ";

$sql = mysqli_query($conn, $select);
$row = mysqli_fetch_array($sql);

// $data_user = read($select);

$gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lapor</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="../../assets/css/decor.css">
  <link rel="manifest" href="manifest.json" />
  <script src="assets/js/script.js"></script>
</head>

<body>

  <div class="container-fluid">
    <div class="row h-screen-60 w-100 justify-content-center mx-auto">
      <div class="col-12 mt-5">
        <h1 class="title">SOS</h1>
      </div>
      <div class="col-12 mt-3">
        <form action="lapor_process.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id']; ?>">

          <!-- NYOBA -->
          <input type="hidden" name="gender_user" id="gender_user" value="<?php echo $_SESSION['gender']; ?>">


          <div class="mb-3">
            <textarea class="form-control" id="story" name="story" rows="5" placeholder="Ceritakan yang kamu alami"></textarea>
          </div>
          <h2>Pertanyaan</h2>
          <div class="mb-3">
            <label for="time" class="form-label">Waktu Kejadian</label>
            <input class="form-control" id="time" name="time" type="datetime-local">
          </div>
          <div class="mb-3">
            <label for="place" class="form-label">Tempat Kejadian</label>
            <input class="form-control" id="place" name="place" type="text">
          </div>
          <div class="mb-3">
            <label for="perpetrator" class="form-label">Pelaku</label>
            <input class="form-control" id="perpetrator" name="perpetrator" type="text">
          </div>
          <div class="mb-3">
            <label for="evidence" class="form-label">Bukti</label>
            <input class="form-control" id="evidence" name="evidence" type="file" accept="image/png, image/jpeg">
          </div>
          <button type="submit" name="submit" id="submit" value="submit" class="btn btn-dark w-100 my-3">Kirim</button>
          <a href="index.php" class="btn btn-outline-secondary w-100 mt-3 mb-5">Kembali</a>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>