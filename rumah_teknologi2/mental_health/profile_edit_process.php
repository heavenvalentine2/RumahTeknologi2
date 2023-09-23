<?php
session_start();
require "functions.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];

        $time = time();
        $new_img_name = $time . $id . $photo;
        move_uploaded_file($tmp, 'photo/' . $new_img_name);
    } else {
        $new_img_name = "default-profile.jpg"; 
    }

    $query = "UPDATE user SET name='$name', photo='$new_img_name' WHERE id='$id'";
    cud($query);

    redirect('profile.php');
} else {
    redirect('profile.php');
}
