<?php
    session_start();
    include_once "functions.php";

    if (isset($_GET['id_report'])){
        $id_report = $_GET['id_report'];
        $sql = "SELECT * FROM user WHERE id != '{$_SESSION['id']}' AND gender = '{$_SESSION['gender']}' AND role = 'professional'";
    }
    else{
        $id_report = "";
        $sql = "SELECT DISTINCT user.* FROM user 
        INNER JOIN messages AS m ON user.id = m.incoming_msg_id
        WHERE user.id != '{$_SESSION['id']}' AND user.gender = '{$_SESSION['gender']}' AND user.role = 'professional'";
        
        // Check if the user's role is 'professional' and modify the SQL query accordingly
        if ($_SESSION['role'] === 'professional') {
            $sql = "SELECT DISTINCT u.* FROM user AS u 
                    INNER JOIN sos_report AS s ON u.id = s.outgoing_id 
                    WHERE u.id != '{$_SESSION['id']}' AND u.gender = '{$_SESSION['gender']}' AND u.role != 'professional'";
        }
    }

    // if ($_SESSION('role') === 'professional')
    // {
    //     $sql = "SELECT * FROM user INNER JOIN sos_repot ON (sos_report.outgoing_id = user.id)";
    // }

    $outgoing_id = $_SESSION['id'];
    $query = mysqli_query($conn, $sql);
    $output = "";
    
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>

