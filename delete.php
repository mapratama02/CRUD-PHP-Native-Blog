<?php

include_once("config/database.php");

$key = $_GET['id'];

$sql = "DELETE FROM `blogpost` WHERE `post_id` = '{$key}'";
$result = mysqli_query($con, $sql);

if ($result == true) {
  header("location: all_post.php?success_deleted");
} else {
  header("location: all_post.php");
}
