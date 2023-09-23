<head>
<?php
session_start();
require 'functions.php';
check_login();
$select = "SELECT * FROM user WHERE id = " . $_SESSION['id'];
$sql = mysqli_query($conn, $select);
$userRow = mysqli_fetch_array($sql);

$query = "SELECT * FROM articles";

$query2 = "
SELECT notes.*
FROM notes
inner join user
on (notes.id = user.id)
WHERE NIS = ". $_SESSION['NIS'] ."  
";

$data_notes = read($query2);

$result = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">

<?php
$title = "Home";
require "header.php"; ?>

</head>
<body>
<div class="container-fluid p-0">
    <div class="row align-items-center w-100 m-0 p-2">
      <div class="w-80">
        <div class="row px-2">
          <div class="col-12 fs-6 p-0">Welcome back</div>
          <div class="col-12 fs-3 fw-bold p-0"><?php echo $userRow['name']; ?></div>
        </div>
      </div>
      <div class="w-20 dropdown">
        <button type="button" class="border-0 btn" data-bs-toggle="dropdown" aria-expanded="false">
          <?php
          $pathx = "photo/" . $userRow['photo'];
          echo '<img src="' . $pathx . '" style= "height: 65px; width:65px;" class="rounded-circle mx-3">';
          ?>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="row align-items-center w-100 mx-0 justify-content-evenly g-2">
      <div class="col-3 p-2">
        <a href="view/sos">
          <button type="button" class="btn btn-light p-2 w-100 rounded-3 title">SOS</button>
        </a>
      </div>
      <div class="col-3 p-2">
        <button type="button" class="btn btn-light p-2 w-100 rounded-3 title">SC</button>
      </div>
      <div class="col-3 p-2">
        <button type="button" class="btn btn-light p-2 w-100 rounded-3 title">TD</button>
      </div>
      <div class="col-3 p-2">
        <button type="button" class="btn btn-light p-2 w-100 rounded-3 title">K</button>
      </div>
    </div>
    <div class="row mx-0 my-4">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded-3 border-0">
          <div class="carousel-item active">
            <img src="https://picsum.photos/id/1/500/300" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/id/2/500/300" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://picsum.photos/id/3/500/300" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
    </div>
    

<div class="row mx-0 mt-4 gy-2" style="margin-bottom: 15vh;">
  <div class="col-12 d-flex justify-content-between align-items-center">
    <h5>Your Articles</h5>
    <?php
    if ($_SESSION['role'] === 'admin') {
        echo '<a href="add_article.php" class="btn btn-dark">Add Article</a>';
    }
    ?>
  </div>
  <?php
  if (mysqli_num_rows($result) > 0) {
    while ($articleRow = mysqli_fetch_assoc($result)) {
      echo '<div class="col-6">';
      echo '<div class="card h-100">';
      echo '<img src="' . $articleRow['image_path'] . '" class="card-img-top img-fluid" alt="Article Image">';
      echo '<div class="card-body d-flex flex-column">';
      echo '<h5 class="card-title" >' . $articleRow['title'] . '</h5>';
      echo '<p class="card-text flex-grow-1">' . $articleRow['content'] . '</p>';
      echo '<p class="card-text">Created at: ' . $articleRow['created_at'] . '</p>';
      
      if ($_SESSION['role'] === 'admin') {
        echo '<a href="edit_article.php?id=' . $articleRow['id'] . '" class="btn btn-dark">Edit</a>';
        echo '<a href="delete_process.php?id=' . $articleRow['id'] . '" class="btn btn-outline-dark mt-2">Delete</a>';
    }
    
      
      echo '</div></div></div>';
    }
  } else {
    echo '<div class="col-12">Belum ada artikel.</div>';
  }
  ?>
</div>
    
    <div class="row mx-0 mt-4 gy-2" style="margin-bottom: 15vh;">
      <div class="col-12">
        <h5>Your Activities</h5>
      </div>
      <div class="col-6">
        <img src="https://picsum.photos/id/12/500/300" class="d-block w-100 rounded-3 border-0" alt="...">
      </div>
      <div class="col-6">
        <img src="https://picsum.photos/id/13/500/300" class="d-block w-100 rounded-3 border-0" alt="...">
      </div>
      <div class="col-6">
        <img src="https://picsum.photos/id/14/500/300" class="d-block w-100 rounded-3 border-0" alt="...">
      </div>
      <div class="col-6">
        <img src="https://picsum.photos/id/15/500/300" class="d-block w-100 rounded-3 border-0" alt="...">
      </div>
    </div>
  </div>

  <div class="fixed-bottom px-3" style="margin-bottom: 2vh">
    <nav class="navbar navbar-expand bg-dark h-screen-10 rounded-5">
      <div class="container-fluid">
        <ul class="navbar-nav justify-content-evenly w-100">
          <li class="nav-item">
            <a class="nav-link fs-3" href="#"><i class="text-info bi bi-house-door-fill"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3" href="#" ><i class="text-light bi bi-clipboard2-check-fill"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3" href="chat_list.php"><i class="text-light bi bi-chat-left-fill"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3" href="profile.php"><i class="text-light bi bi-person-fill"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="container w-100 justify-content-center d-flex">
                    <div class="row align-items-center">
                        <div class="col-6">
                        <h5 class="tbl-title mt-5 mx-3 mb-4 fs-1 fw-bold">Notes</h5>
                    </div>
                    <div class="col-6">      
                        <a href="notes_add.php" type="button" class="btn btn-dark mx-3 mt-5 mb-4" > Take a note </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container card-area justify-content-center d-flex">
            <div class="card w-75 border-0">
                <div class="card-body">
        <!-- AMAN -->
                        <?php if (sizeof($data_notes) != 0) : ?>
                        <?php foreach ($data_notes as $notes) : ?>
                            <div class="card mx-3 mt-3">
                                <div class="card-body pb-2">
                                    <h5 class="card-title"> <?= $notes["title"]; ?> </h5>
                                    <p class="d-blodck" style="height:100px; overflow: hidden;"> <?= strip_tags($notes["content"]); ?>
                                    </p>
                                </div>

                                <div class="dropdown" data-display="static">
                                    <button class="btn btn-outline-dark float-end" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                                    :
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="notes_edit.php?id_notes=<?= $notes['id_notes']; ?>">Edit Note</a></li>
                                        <li><a class="dropdown-item" href="notes_delete_process.php?id_notes=<?= $notes['id_notes']; ?>">Delete Note</a></li> 
                                    </ul>  
                                </div>

                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Collabolators</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <input type="text" name="id_notes" value="<?= $id_notes; ?>">
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
        test
            <?php else : ?>
                <div class="card border-0 ">
                    <div class="card-body text-center ">
                        Notes you add appear here
                    </div>
                </div>    
                        
            <?php endif; ?>

    </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>