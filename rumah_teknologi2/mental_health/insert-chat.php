<?php
    session_start();
    require 'functions.php';

    if (isset($_SESSION['id']))
    {
        $outgoing_id = $_SESSION['id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if(isset($_GET['id_report']))   {
            $id_report = mysqli_real_escape_string($conn, $_POST['id_report']);

            if(!empty($message)){
                $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, id_report)
                                            VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', {$id_report})") or die();
                $sql2 = mysqli_query($conn, "INSERT INTO sos_report (incoming_id) VALUES ({$incoming_id})") or die();
            }
        }
        else
        {
            if(!empty($message)){
                $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, id_report)
                                            VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '')") or die();
            }
        }
    }
    else
    {
        redirect('login.php');
    }

?>