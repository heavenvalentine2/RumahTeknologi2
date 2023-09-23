<?php
session_start();
require 'functions.php';
check_login();

$id_report = isset($_GET['id_report']) ? $_GET['id_report'] : null;

$outgoing_gender = isset($_SESSION['outgoing_gender']) ? $_SESSION['outgoing_gender'] : null;
$query = "select * from user WHERE id = " . $_SESSION['id'] . " ";

$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);
?>


<?php
$title = "Chat";
require "header.php"; ?>

<body>
    <div class="container mt-3">
        <div class="card border-0 shadow bg-body rounded mt-4 p-0">
            <section class="users">
                <header class="pb-3 card-header rounded-top p-3">
                    <div class="d-flex align-items-center">
                        <?php if ($_SESSION['role'] != 'professional') : ?>
                            <a href="index.php"><i class="col h3 bi bi-arrow-left mx-3 text-dark"></i></a>
                        <?php endif; ?>
                        <button type="button" class="border-0 btn" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            $pathx = "photo/" . $row['photo'];
                            echo '<img src="' . $pathx . '" style= "height: 65px; width:65px;" class="rounded-circle mx-3">';
                            ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>

                        <div class="flex-column flex-grow-1 details group mt-3 mx-2">
                            <h5 class="fw-bold fs-4"><?php echo $row['name'] ?></h5>
                            <p><?php echo $row['acc_status'] ?></p>
                        </div>
                        <div class="search align-items-start position-relative">
                            <div class="input-group border border-1 rounded">
                                <span class="text position-relative mt-1 me-2">Select an user to start chat</span>
                                <input type="search" class="form-cont rol position-absolute border-0 p-2" style="width: calc(100% - 50px); height:38px " placeholder="Enter name to search...">
                                <button class="btn btn-dark position-relative rounded-end-pill" style="width: 50px;" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- User list goes here -->

                <div class="card-body users-list " style="width: 100%;">
                </div>
            </section>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        <?php if (isset($_GET['id_report'])) {  ?>
            var id_report = <?php echo $_GET['id_report'] ?>
        <?php } else { ?>
            var id_report = false
        <?php }  ?>
    </script>
    <script src="assets/js/chat_list.js"></script>
</body>

</html>

</html>