<?php
session_start();
require 'functions.php';
check_login();

// Check if the logged-in user has admin role
if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php"); // Redirect to home page if not an admin
    exit();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imagePath = ''; // Initialize image path

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image = $_FILES['image'];
        $imagePath = 'article_images/' . time() . '_' . $image['name'];
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    // Insert the article into the database
    $insertQuery = "INSERT INTO articles (title, content, image_path) VALUES ('$title', '$content', '$imagePath')";
    mysqli_query($conn, $insertQuery);

    header("Location: index.php"); // Redirect to home page after adding article
    exit();
}
?>
