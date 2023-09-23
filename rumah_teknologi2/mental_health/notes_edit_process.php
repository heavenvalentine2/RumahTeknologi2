<?php 

    require_once "functions.php";
    
    if (!isset($_POST['submit']))
    {
        redirect("notes.php");
        exit();
    }
    
    $id_notes = $_POST['id_notes'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "
    UPDATE `notes` 
    SET title='$title', 
        content='$content'
    WHERE id_notes = '$id_notes'";

    cud($query); 

    redirect('notes.php');
