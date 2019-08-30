<?php

session_start();

include_once("config/database.php");

$id = $_POST['id'];
$title = $_POST['post_title'];
$content = $_POST['post_content'];
$status = $_POST['post_status'];
$author = $_POST['author'];
$comment = $_POST['comment_status'];

$file = $_FILES['post_header'];
$filename = $_FILES['post_header']['name'];
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$allowed = array('gif', 'png', 'jpeg', 'jpg');

if ($filename) {
  if (!in_array($ext, $allowed)) {
    echo 'error';
  } else {
    move_uploaded_file($_FILES['post_header']['tmp_name'], "libs/img/" . $filename);
    $sql1 = "UPDATE `blogpost` SET `post_title`='$title',`post_header`='$filename',`post_content`='$content',`post_status`='$status',`post_status_comment`='$comment' WHERE `post_id` = '$id'";

    $result1 = mysqli_query($con, $sql1);
    if ($result1 == true) {
      header("location: all_post.php");
    } else {
      header("location: post_edit.php");
    }
  }
} else {
  $sql2 = "UPDATE `blogpost` SET `post_title`='$title',`post_content`='$content',`post_status`='$status',`post_status_comment`='$comment' WHERE `post_id` = '$id'";

  $result2 = mysqli_query($con, $sql2);
  if ($result2 == true) {
    header("location: all_post.php");
  } else {
    header("location: post_edit.php");
  }
}
