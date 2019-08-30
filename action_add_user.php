<?php

include_once("config/database.php");

$name = $_POST['name'];
$mail = $_POST['email'];
$pass = md5($_POST['password']);
$role = $_POST['role'];

$sql = "INSERT INTO `user`(`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_role`) VALUES (NULL,'$name','$pass','$mail','default.png','$role')";

$result = mysqli_query($con, $sql);
if ($result == true) {
  header("location: user.php");
} else {
  header("location: add_user.php");
}
