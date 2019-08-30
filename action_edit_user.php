<?php
session_start();
include_once("config/database.php");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$file = $_FILES['profile'];
$filename = basename($_FILES['profile']['name']);
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$allowed = array('gif', 'png', 'jpeg', 'jpg');

if ($filename) {
  if (!in_array($ext, $allowed)) {
    echo 'error';
  } else {
    move_uploaded_file($_FILES["profile"]["tmp_name"], "libs/img/" . $filename);
    $sql2 = "UPDATE `user` SET `user_name`='$name',`user_email`='$email',`user_profile`='$filename' WHERE `user_id` = '$id'";

    mysqli_query($con, $sql2);
    $_SESSION['user_name'] = $name;
    $_SESSION['user_profile'] = $filename;
    header("location: user.php");
  }
} else {
  $sql1 = "UPDATE `user` SET `user_name`='$name',`user_email`='$email' WHERE `user_id` = '$id'";

  mysqli_query($con, $sql1);
  $_SESSION['user_name'] = $name;
  header("location: user.php");
}
