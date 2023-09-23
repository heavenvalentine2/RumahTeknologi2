<?php
  session_start();
  require "functions.php";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NIS = $_POST['NIS'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $gender = $_POST['gender'];
    $imageData = $_POST['image_data'];

    // Decode data gambar base64
    $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
    $imageData = str_replace(' ', '+', $imageData);
    $decodedImage = base64_decode($imageData);

    // Nama file gambar baru
    $imageName = 'user_' . uniqid() . '.jpg';

    // Simpan gambar ke folder
    $uploadPath = 'uploads/' . $imageName;
    file_put_contents($uploadPath, $decodedImage);

    $error = false; 

    if ($NIS == ""){
      $error = true;
    }

    if ($name == ""){
      $error = true;
    }

    if ($gender == ""){
      $error = true;
    }

    if ($password == ""){
      $error = true;
    }

    if ($password2 == ""){
      $error = true;
    }

    if ($gender == ""){
      $error = true;
    }

    if ($imageData == ""){
      $error = true;
    }

    if ($error == true)
    {
      redirect('register.php');
    }
  }
  else
  {
    redirect('register.php');
  } 

  $select = "SELECT NIS FROM user WHERE NIS = '$NIS'";
  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0)
  {
    $_SESSION['error'] = 'The NIS account already exists.';
    redirect('register.php');
  }
  
  if($password != $password2)
  { 
    $_SESSION['error'] = 'Please make sure your passwords match.';
    redirect('register.php');
  }

  $password = password_hash($password, PASSWORD_DEFAULT);
   
  $register = "INSERT INTO user (id, photo, NIS, name, gender, gambar, password, role, status) VALUES ('', 'default-profile.jpg', '$NIS', '$name', '$gender', '$imageName', '$password', 'siswa', 'pending')";
  mysqli_query($conn, $register);

  $_SESSION['message']  = 'Your account is now pending for approval';
  
  header("Location: register.php");
  return mysqli_affected_rows($conn);
