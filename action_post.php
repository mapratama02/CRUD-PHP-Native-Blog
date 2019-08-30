<?php
session_start();
include_once("config/database.php");

$title = $_POST['post_title'];
$content = $_POST['post_content'];
$status = $_POST['post_status'];
$author = $_POST['author'];
$comment = $_POST['comment_status'];
$created = time();

if ($title == "" || $content == "" || $status == "" || $author == "" || $comment == "") {
  echo '<script>alert("Null data")</script>';
  header("location: post.php");
} else {
  $filename = $_FILES['post_header']['name'];
  $filemime = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
  $allowed = array('gif', 'png', 'jpeg', 'jpg');

  if (!in_array($filemime, $allowed)) {
    echo 'error';
  } else {

    move_uploaded_file($_FILES['post_header']['tmp_name'], 'libs/img/' . $filename);

    $query = "INSERT INTO `blogpost` VALUES (NULL,'$title','$filename','$content','$author','$created','$status','$comment')";

    $result = mysqli_query($con, $query);

    if ($result == true) {
      header("location: all_post.php");
    } else {
      header("location: post.php");
    }
  }
}
