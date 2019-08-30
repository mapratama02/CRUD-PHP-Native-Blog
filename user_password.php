<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header("location: login.php?acces_denied");
}

include_once("config/database.php");
$id = $_SESSION['user_id'];

$query = "SELECT * FROM `user` WHERE `user_id` = '$id'";
$no = 1;

$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/css/dashboard.css">
  <link rel="stylesheet" href="libs/FontAwesome/css/all.min.css">
  <title>User</title>
</head>

<body>

  <div id="wrap">
    <?php include_once('sidebar.php'); ?>

    <div class="main-page">

      <nav class="navbar navbar-expand-lg navbar-dark">
        <span class="navbar-brand">Uji Level</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <span class="dropdown-header"><?= $_SESSION['user_name'] ?></span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <?php foreach ($result as $d) : ?>
        <div class="page">
          <h1>Edit Password</h1>
          <hr>

          <div class="row">
            <div class="col-md-8">

              <form action="action_edit_password.php" method="post">

                <div class="form-group row">
                  <div class="col-md-3">
                    <label for="current_password" class="col-form-label">Current Password</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" name="current_password" id="current_password" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3">
                    <label for="new_password" class="col-form-label">New Password</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" name="new_password" id="new_password" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

              </form>
            <?php endforeach; ?>
          </div>
        </div>

      </div>

    </div>
  </div>

</body>

<script src="libs/js/jquery.min.js"></script>
<script src="libs/js/popper.min.js"></script>
<script src="libs/js/bootstrap.min.js"></script>
<script src="plugins/ckeditor/ckeditor.js"></script>

<script>
  $(function() {
    CKEDITOR.replace('editor');
  });
</script>

</html>