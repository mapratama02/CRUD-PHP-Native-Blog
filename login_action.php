<?php

include_once("config/database.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

if (empty($email) && empty($password)) {
  header("location: login.php?empty_all");
} elseif (empty($email) && !empty($password)) {
  header("location: login.php?empty_email");
} elseif (!empty($email) && empty($password)) {
  header("location: login.php?empty_password");
} else {
  $query = "SELECT * FROM `user` WHERE `user_email` LIKE '$email' AND `user_pass` = '$password'";

  $result = mysqli_query($con, $query);

  foreach ($result as $r) {
    $user_id = $r['user_id'];
    $user_name = $r['user_name'];
    $user_pass = $r['user_pass'];
    $user_email = $r['user_email'];
    $user_profile = $r['user_profile'];
    $user_role = $r['user_role'];
  }

  $num_rows = $result->num_rows;

  if ($num_rows > 0) {
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_pass'] = $user_pass;
    $_SESSION['user_email'] = $user_email;
    $_SESSION['user_profile'] = $user_profile;
    $_SESSION['user_role'] = $user_role;
    header("location: user.php");
  } else {
    header("location: login.php?incorrect");
  }
}
