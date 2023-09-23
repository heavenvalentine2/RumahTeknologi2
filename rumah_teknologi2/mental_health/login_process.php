<?php
session_start();
session_start();
require "functions.php";

if (isset($_POST['submit'])) {
    $NIS = $_POST['NIS'];
    $password = $_POST['password'];

    $error = false;

    if ($NIS == "") {
        $error = true;
    }

    if ($password == "") {
        $error = true;
    }

    if ($error == true) {
        $_SESSION['error']  = 'Please make sure all fields are filled in correctly.';
        redirect('login.php');
    } else {
        $select = mysqli_query($conn, "SELECT * FROM user WHERE NIS = '$NIS'");
        $row = mysqli_fetch_array($select);

        $password_hash = $row['password'];
        $status  = $row['status'];
        $check_user = mysqli_num_rows($select);

        if ($check_user == 1) {
            if (password_verify($password, $password_hash)) {
                if ($status == "approved") {
                    $acc_status = "Online";
                    $result = mysqli_query($conn, "UPDATE user 
                    SET acc_status = '{$acc_status}' WHERE id = {$row['id']}");
                    $query = "
                        SELECT *
                        FROM user 
                        WHERE NIS = $NIS
                    ";
                    $result2 = read($query);

                    if ($result) {
                        $_SESSION['NIS'] = $NIS;
                        $_SESSION['name'] = $result2[0]['name'];
                        $_SESSION['gender'] = $result2[0]['gender'];
                        $_SESSION['role'] = $result2[0]['role'];
                        $_SESSION['id'] = $result2[0]['id'];
                        $_SESSION['photo'] = $result2[0]['photo'];

                        $_SESSION["login"] = true;
                        if($_SESSION['role'] == 'professional')
                        {
                            redirect('chat_list.php');
                        }
                        else
                        {
                            redirect('index.php');
                        }
                    }
                } elseif ($status == "pending") {
                    $_SESSION['error'] = 'Please wait for your account approval.';
                    redirect('login.php');
                } else {
                    $_SESSION['error'] = 'Authentication failed. Please check your username and password and try again.';
                    redirect('login.php');
                }
            } else {
                $_SESSION['error'] = 'Authentication failed. Please check your username and password and try again.';
                redirect('login.php');
            }
        } else {
            $_SESSION['error'] = "Couldn't find your account.";
            redirect('login.php');
        }
    }
} else{
    redirect('login.php');
}

?>

