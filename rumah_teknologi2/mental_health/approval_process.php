<?php
session_start();
require "functions.php";

if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    // $role = $_POST['role'];

    $updateQuery = "UPDATE user SET STATUS = 'approved' WHERE id = $id";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        $_SESSION['message'] = 'User approved and role updated.';
    } else {
        $_SESSION['error'] = 'Failed to update user role.';
    }

    header("Location: approval.php");
    exit();
}

if (isset($_POST['deny'])) {
    $id = $_POST['id'];

    $updateQuery = "UPDATE user SET STATUS = 'deny' WHERE id = $id";
    $result = mysqli_query($conn, $updateQuery);

    // $deleteQuery = "DELETE FROM user WHERE id = $id";
    // $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        $_SESSION['message'] = 'User denied.';
    } else {
        $_SESSION['error'] = 'Failed to deny user.';
    }

    header("Location: approval.php");
    exit();
}
