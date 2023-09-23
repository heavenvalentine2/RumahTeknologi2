<?php 
    session_start();
    include_once "../../functions.php";

    $id_report = $_GET['id_report'];
    $incoming_id = $_GET['id'];
    // $outgoing_id = $_SESSION['id'];

    // $sql = "INSERT INTO ()"
    // mysqli_query($conn, $sql);

    // var_dump($incoming_id);
    header("Location: ../../chat_page.php?id=$incoming_id&id_report=$id_report");


?>