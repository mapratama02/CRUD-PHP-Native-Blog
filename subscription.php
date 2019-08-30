<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header("location: login.php?acces_denied");
}

include_once("config/database.php");
$role = $_SESSION['user_role'];

$query = "SELECT * FROM `user` INNER JOIN `role` ON `user`.user_role = `role`.user_role AND `user`.user_role != 2 AND `user`.user_role !='$role'";
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

      <div class="page">
        <h1>Subscription</h1>
        <hr>

        <?php foreach ($result as $r) : ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card my-3">
                <div class="row">
                  <div class="col-md-3">
                    <img src="libs/img/<?= $r['user_profile'] ?>" alt="" class="card-img">
                  </div>
                  <div class="col-md-9">
                    <div class="card-body">
                      <h1><?= $r['user_name'] ?></h1>
                      <hr>
                      <p>mailto: <a href="mailto:<?= $r['user_email'] ?>"><?= $r['user_email'] ?></a></p>
                      <a href="user_post.php?id=<?= $r['user_id'] ?>" class="btn btn-outline-primary">Take a look</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

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