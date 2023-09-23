<?php
    session_start();
    require "functions.php";

    $outgoing_id = $_SESSION['login'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    $sql = "SELECT * FROM user WHERE NOT NIS = '{$outgoing_id}' AND name LIKE '%{$searchTerm}%' AND role = 'professional' AND gender "; 
    
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    } else {
        $output .= '
            <div class="alert alert-danger text-center">
                No user found
            </div>
        ';
    }
    echo $output;
?>