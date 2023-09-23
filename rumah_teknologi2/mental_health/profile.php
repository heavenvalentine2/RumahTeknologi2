<?php

session_start();
require 'functions.php';
check_login();

$select = "select * from user WHERE NIS = " . $_SESSION['NIS'] . " ";
$sql = mysqli_query($conn, $select);
$row = mysqli_fetch_array($sql);


$title = "Profile";
require "header.php";
?>

<body>
    <div class="container mt-4">
        <div class="card border-0 shadow bg-body rounded mt-4 p-0">
            <div class="card-header d-flex">
                <?php if ($_SESSION['role'] != 'professional') : ?>
                    <a href="index.php"><i class="col h3 bi bi-arrow-left mx-3 text-dark"></i></a>
                <?php else : ?>
                    <a href="chat_list.php"><i class="col h3 bi bi-arrow-left mx-3 text-dark"></i></a>
                <?php endif; ?>

                <h4 class="me-auto ms-5 fw-bold">Profile</h4>
            </div>
            <div class="card-body p-3">
                <form action="profile_edit_process.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="text-center">
                        <?php
                        $pathx = "photo/" . $row['photo'];
                        echo '<img src="' . $pathx . '" style= "height: 65px; width:65px;" class="rounded-circle mx-3">';
                        ?>
                    </div>


                    <div class="input-group d-flex align-items-center gap-3 mb-3">
                        <label class="form-label fs-5 fw-semibold" for="NIS" style="width:150px;">NIS</label>
                        <div>
                            <input class=" form-control-plaintext fw-semibold rounded" type="text" name="NIS" id="NIS" readonly value="<?php echo $row['NIS']; ?>">
                        </div>
                    </div>

                    <div class="input-group d-flex align-items-center gap-3 mb-3">
                        <label class="form-label fs-5 fw-semibold" for="name" style="width:150px;">Name</label>
                        <input class=" form-control fw-semibold rounded" type="text" name="name" id="name" value="<?php echo $row['name']; ?>">
                    </div>

                    <div class="input-group d-flex align-items-center gap-3 mb-3">
                        <label class="form-label fs-5 fw-semibold" for="role" style="width:150px;">Role</label>
                        <div>
                            <input class=" form-control-plaintext fw-semibold rounded" type="text" name="role" id="role" readonly value="<?php echo $row['role']; ?>">
                        </div>
                    </div>


                    <div class="mb-4 row d-flex align-items-center justify-content-between">
                        <label class="fs-5 fw-semibold col-form-label col-sm-2 my-1" for="photo" style="width:150px;">Photo</label>
                        <div class="col ps-4">
                            <input class="form-control" type="file" id="photo" name="photo">
                            <div class="form-text">Upload a new photo or delete the current one:</div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="deletePhoto" name="deletePhoto">
                                <label class="form-check-label" for="deletePhoto">Delete current photo</label>
                            </div>
                        </div>
                    </div>

                    <div class="group float-end gap-3 rounded ">
                        <button class="flex-grow-1 form-button btn btn-dark" type="submit" name="submit" value="submit">Submit</button>
                        <button type="button" class="btn btn-danger">
                            <a href="<?php echo ($_SESSION['role'] != 'professional') ? 'index.php' : 'chat_list.php'; ?>" class="text-decoration-none text-bg-danger">Cancel</a>
                        </button>

                    </div>

                </form>
            </div>
        </div>

    </div>
</body>

</html>