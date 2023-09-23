<?php
session_start();
require "functions.php";

var_dump($_POST);

if (!isset($_POST['submit'])) {
  redirect("notes_add.php");
  exit();
}

$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST['id'];

$query = "
  INSERT INTO notes (id_notes, title, content, id) 
  VALUES ('', '$title', '$content', '$id')
";

mysqli_query($conn, $query);

header("Location: index.php");
