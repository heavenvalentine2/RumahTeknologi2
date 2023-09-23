<?php
session_start();
require "../../functions.php";

// var_dump($_POST);

if (!isset($_POST['submit'])) {
  redirect("lapor.php");
  exit();
}

$outgoing_id = $_SESSION['id'];
$outgoing_gender = $_SESSION['gender'];
$_SESSION['outgoing_gender'] = $outgoing_gender;

$message = $_POST['message'];
$story = $_POST['story'];
$place = $_POST['place'];
$perpetrator = $_POST['perpetrator'];
$evidence = $_FILES['evidence']['name'];
$tmp = $_FILES['evidence']['tmp_name'];

$time = time();
$new_img_name = $time.$outgoing_id.$evidence;

move_uploaded_file($tmp, 'C:/xampp/htdocs/rumah_teknologi2/mental_health/view/sos/evidence/' . $new_img_name);

$query = "
  INSERT INTO sos_report(id_report, outgoing_id, story, place, perpetrator, evidence, gender) 
  VALUES('', '$outgoing_id', '$story', '$place', '$perpetrator', '$new_img_name', '$outgoing_gender')
";

// var_dump($query);

mysqli_query($conn, $query);

// $data_send = [];

$id_report = mysqli_insert_id($conn);

$send = "
  SELECT * 
  FROM user
  WHERE role = 'professional'
";

// $result = mysqli_query($conn, $send);
// $data_send = mysqli_fetch_assoc($send);  

// header("Location: ../../chat_list.php?id_report=$id_report");
header("Location: ../../index.php");


// header("Location: chat_list.php");



?>