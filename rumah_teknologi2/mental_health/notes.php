<?php
session_start();
require "functions.php";
check_login();

// if pake read
// $data_notes = [];

$query = "
  SELECT notes.*
  FROM notes
  inner join user
  on (notes.id = user.id)
  WHERE NIS = ". $_SESSION['NIS'] ."  
";

$data_notes = read($query);

$title = "Notes"; 
require "header.php"; ?>



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
    
        <?php else : ?>
            <div class="card border-0 ">
                <div class="card-body text-center ">
                    Notes you add appear here
                </div>
            </div>    
                    
        <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>

