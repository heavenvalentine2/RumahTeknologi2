<?php
session_start();
require 'functions.php';
check_login();

if (!isset($_SESSION['NIS'])) {
    header("location: login.php");
    exit();
}

if (isset($_GET['id_report'])) {
    $report = mysqli_real_escape_string($conn, $_GET['id_report']);

    $select = "
    SELECT sos_report.*
    FROM sos_report
    INNER JOIN user
    ON (sos_report.outgoing_id = user.id)

    ";
    // $id_report = $row['id_report'];
    // $id_report = $_GET['id_report'];
    $sql = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($sql);
    $story = $row['story'];
    $evidence = $row['evidence'];
    $time = $row['time'];
    $place = $row['place'];
    $perpetrator = $row['perpetrator'];

    $sosreport = 'story: ' . $story . ' evidence:' . $evidence . ' place:' . $place . ' perpetrator:' . $perpetrator;
    // $sosreport = "story: " . $story . "\n" .
    //     "evidence: " . $evidence . "\n" .
    //     "place: " . $place . "\n" .
    //     "perpetrator: " . $perpetrator;

    // $ = $row['']; 

}


$title = "Chat";
require "header.php";
?>

<body>
    <div class="container mt-3">
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
                        <a href="chat_list.php"><i class="col h3 bi bi-arrow-left mx-3 text-dark"></i></a>
                        <?php
                        $pathx = "photo/" . $row['photo'];
                        echo '<img src="' . $pathx . '"class="rounded-circle mx-3" style="width:50px; height:50px;">';
                        ?>

                        <div class="flex-column flex-grow-1 details group mt-3 mx-2">

                            <p class="fw-bold mb-1"><?php echo $row['name']; ?></p>
                            <p><?php echo $row['acc_status']; ?></p>

                        </div>

                </header>
                <div class="chat-box mx-4" style="overflow-y: auto; height:450px;">
                    <!-- Display chat messages here -->

                </div>

                <form action="#" class="typing-area d-flex mb-4 border border-1 rounded" style="margin: 50px 150px 0 150px;" role="search" autocomplete="off">
                    <input type="text" class="outgoing_id" name="outgoing_id" value="<?php echo $_SESSION['id']; ?>" hidden>
                    <?php if (isset($_GET['id_report'])) : ?>
                        <input type="text" class="id_report" name="id_report" value="<?php echo $_GET['id_report']; ?>" hidden>
                    <?php endif  ?>
                    <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id; ?>" hidden>


                    <?php if (isset($_GET['id_report'])) : ?>
                        <input name="message" class="input-field form-control position-relative border-0 rounded" style="width: calc(100% - 50px); height: 38px" 
                        value='SOS LAPORAN! Segera cek link berikut: 
                        <a href="view/sos/read_report.php?id=<?php echo $_SESSION['id']; ?>
                            &id_report=<?php echo $report; ?>">
                            <?php echo "view/sos/read_report.php?id=$id&id_report=$report" ?>
                        </a>' />

<!-- autocomplete="off"> -->

                        <!-- TESTING -->
                        <!-- <textarea name="message" class="input-field form-control position-relative border-0 rounded" style="width: calc(100% - 50px); height: auto; max-height: 100px; resize: none;" autocomplete=" off"></textarea> -->

                    <?php else : ?>
                        <input type="text" name="message" class="input-field form-control position-relative border-0 rounded " style="width: calc(100% - 50px); height:38px " placeholder=" Message..." autocomplete="off">
                        <!-- TESTING -->
                        <!-- <textarea name="message" class="input-field form-control position-relative border-0 rounded" style="width: calc(100% - 50px); height: auto; max-height: 100px; resize: none;" placeholder="Type your message..." autocomplete="off"></textarea> -->
                    <?php endif  ?>

                    <button class="btn btn-dark position-relative rounded-end" style="height: 38px; width:50px" type="submit"><i class="bi bi-send"></i></button>
                </form>
            </section>
        </div>
    </div>

    <script src="assets/js/chat_page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>