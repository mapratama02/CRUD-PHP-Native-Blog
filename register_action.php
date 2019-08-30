<?php

include_once("config/database.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "INSERT INTO `user`(`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_role`) VALUES (NULL, '{$name}', '{$password}', '{$email}', 'default.png', 2)";

mysqli_query($con, $query);
header("location: login.php");
