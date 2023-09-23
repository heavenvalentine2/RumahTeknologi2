<?php
session_start();
require "functions.php";
check_login();

$name = $_POST['name'];
$number = $_POST['number']; 
    
if (isset($_POST['submit']))
    {

        $error = false;

        if ($name == "")
        {
            $error = true;
        }

        if ($number == "")
        {
            $error = true;
        }

        if ($error == true)
        {
            $_SESSION['error']  = 'Please make sure all fields are filled in correctly.';
            redirect('contact_add.php');
        }

        $query ="INSERT INTO contact ('name','number') 
        VALUES ('$name','$number')";

        cud($query);
        redirect('contact.php');
    }

    else
    {
        redirect('contact_add.php'); 
    }
?>