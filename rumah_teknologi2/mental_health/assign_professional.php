<?php
session_start();
require "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $id_report = $_POST['report_id'];
    $assigned_professional_id = $_POST['assigned_professional']; // Professional ID
    $outgoing_id = $_POST['outgoing_id']; // User ID

    // Construct the message with HTML link
    $msg = "SOS LAPORAN! Segera cek link berikut: <a href='view/sos/read_report.php?id=$outgoing_id&id_report=$id_report'>view/sos/read_report.php?id=$outgoing_id&id_report=$id_report</a>";

    // Prepare the query
    $query = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, id_report) 
        VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "iisi", $assigned_professional_id, $outgoing_id, $msg, $id_report);
    
    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        $update_query = "UPDATE sos_report SET status = 'ongoing' WHERE id_report = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, "i", $id_report);
        mysqli_stmt_execute($update_stmt);
        mysqli_stmt_close($update_stmt);
        header("Location: approval.php");
        exit();
    } else {
        // Error occurred
        // You can redirect with an error message or handle it accordingly
        header("Location: assign_professional.php?error=1");
        exit();
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
