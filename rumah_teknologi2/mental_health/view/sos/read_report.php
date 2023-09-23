<?php

session_start();
require '../../functions.php';
check_login();

$select = "select * from user WHERE NIS = " . $_SESSION['NIS'] . " ";
$sql = mysqli_query($conn, $select);
$row = mysqli_fetch_array($sql);

$incoming_id = $_GET['id'];

$id = $incoming_id;

if (isset($_GET['id_report'])) {
    $id_report = $_GET['id_report'];

    $select = "
    SELECT sos_report.*
    FROM sos_report
    INNER JOIN user
    ON (sos_report.outgoing_id = user.id)
    WHERE sos_report.id_report = $id_report
    ";

    // TESTING
    // $id_report = $row['id_report'];
    // $row = read($select);

    $sql = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($sql);
    // $row[0]['story'];
    // $row[0]['evidence'];
    // $row[0]['time'];
    // $row[0]['place'];
    // var_dump($row[0]['place']);
    // $row[0]['perpetrator'];

    $story = $row['story'];
    $evidence = $row['evidence'];
    $time = $row['time'];
    $timeString = date('Y-m-d H:i:s', strtotime($time));
    $place = $row['place'];
    $perpetrator = $row['perpetrator'];
    $statuslaporan = $row['status'];
}

$title = "Sos_Report";
require "../../header.php";

// Handle the form submission for updating status
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["status"])) {
    $new_status = $_POST["status"];
    $id_report = $_POST["id_report"];
    $statuslaporan = $new_status;
    // Update the status in the database
    $update_query = "UPDATE sos_report SET status = ? WHERE id_report = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("si", $new_status, $id_report);

    if ($stmt->execute()) {
        // Reload the page to show the updated status
        header("Location: read_report.php?id=" . $incoming_id . "&id_report=" . $id_report);
        exit();
    } else {
        echo "Error updating status.";
    }

    $stmt->close();
}



?>

<body>
    <div class="container mt-3  ">
        <div class="card border-0 shadow bg-body rounded mt-4 p-0">
            <section class="users">
                <header class="pb-3 card-header rounded-top p-3">
                    <?php
                    $id = mysqli_real_escape_string($conn, $_GET['id']);

                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE id = {$id}");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    } else {
                        header("location: index.php");
                        exit();
                    }
                    ?>
                    <div class="d-flex align-items-center">
                        <a href="../../chat_page.php?id=<?php echo $id ?> ">
                            <!-- RETURN ID TO CHAT PAGE -->
                            <i class="col h3 bi bi-arrow-left mx-3 text-dark"></i></a>
                        <?php
                        $pathx = "photo/" . $row['photo'];
                        echo '<img src="' . $pathx . '"class="rounded-circle mx-3" style="width:50px; height:50px;">';
                        ?>

                        <div class="flex-column flex-grow-1 details group mt-3 mx-2">

                            <p class="fw-bold mb-1"><?php echo $row['name']; ?></p>
                            <p><?php echo $row['acc_status']; ?></p>

                        </div>
                </header>
                <div class=" chat-box mx-4">
                    <!-- class= "style="overflow-y: auto;overflow-x: hidden; height: 550px;" -->
                    <div class="row my-4">
                        <div class="col">
                            <h5 for="place" class="form-label">Tempat Kejadian</h5>
                            <p><?php echo $place; ?></p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <h5 for="place" class="form-label">Waktu Kejadian</h5>
                            <p><?php echo $timeString; ?></p>

                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <h5 for="place" class="form-label">Pelaku</h5>
                            <p><?php echo $perpetrator; ?></p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <h5 for="place" class="form-label">Cerita</h5>
                            <p><?php echo $story; ?></p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <h5 for="place" class="form-label">Bukti</h5>
                            <?php
                            // $pathx = "evidence/" . $evidence;
                            // echo '<img src="' . $pathx . '"class="rounded-circle mx-3" style="width:50px; height:50px;">';
                            echo $evidence;

                            ?>
                        </div>
                    </div>

                    <?php if ($_SESSION['role'] === 'professional') : ?>

                        <?php if ($statuslaporan === 'finish') : ?>
                            <h4>This report is marked as <span class="text-success">Finish</span>.</h4>
                        <?php elseif ($statuslaporan === 'ongoing') : ?>
                            <h4>This report is marked as <span class="text-primary">Ongoing</span>.</h4>
                        <?php elseif ($statuslaporan === 'dismissed') : ?>
                            <h4>This report is marked as <span class="text-danger">Dismiss</span>.</h4>
                        <?php endif; ?>

                        <div class="row my-4">
                            <div class="col">

                                <form method="post">
                                    <input type="hidden" name="id_report" value="<?php echo $id_report; ?>">
                                    <?php if ($statuslaporan !== 'finish') : ?>
                                        <button class="btn btn-dark w-20" type="submit" name="status" value="finish">Mark as Done</button>
                                    <?php endif; ?>
                                    <?php if ($statuslaporan !== 'ongoing') : ?>
                                        <button class="btn btn-dark w-20" type="submit" name="status" value="ongoing">Mark as Ongoing</button>
                                    <?php endif; ?>
                                    <?php if ($statuslaporan !== 'dismissed') : ?>
                                        <button class="btn btn-dark w-20" type="submit" name="status" value="dismissed">Mark as Dismiss</button>
                                    <?php endif; ?>
                                </form>

                            </div>
                        </div>
                    <?php endif; ?>

            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>