<?php

include_once("config/database.php");

$key = $_GET['id'];

$sql = "DELETE FROM `deleted_post` WHERE `post_id` = '{$key}'";
$result = mysqli_query($con, $sql);

if ($result == true) {
  header("location: deleted_post.php?success_deleted");
} else {
  header("location: deleted_post.php");
}
