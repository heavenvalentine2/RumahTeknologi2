<?php

require_once "functions.php";

if (!isset($_POST['submit'])) {
    redirect("contact.php");
    exit();
}

// name ini dari index dan sql
$id = $_POST['id'];
$name = $_POST['name'] ;
$number = $_POST['number'];
$instance = $_POST['instance'];
$schedule_start = $_POST['schedule_start'];
$schedule_end = $_POST['schedule_end'];
$profession = $_POST['profession'];


$query = "UPDATE `contact` SET name = '$name', number = '$number',instance = '$instance', profession = '$profession', schedule_start = '$schedule_start',schedule_end = '$schedule_end' 
    WHERE id = '$id'";

cud($query);

redirect('contact.php');
