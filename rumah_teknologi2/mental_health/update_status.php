<?php
session_start();
require 'functions.php';
check_login();

if ($_SESSION['role'] != 'admin') {
    redirect('index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['user_ids']) && isset($_POST['user_roles']) && isset($_POST['user_statuses'])) {
        $user_ids = $_POST['user_ids'];
        $user_roles = $_POST['user_roles'];
        $user_statuses = $_POST['user_statuses'];

        for ($i = 0; $i < count($user_ids); $i++) {
            $id = $user_ids[$i];
            $role = $user_roles[$i];
            $status = $_POST['status'];

            $query = "UPDATE user SET role = '$role', status = '$status' WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
        }

        redirect('approval.php');
    } else {
        echo "Missing required fields.";
    }
}
