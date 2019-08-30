<?php
session_start();
include_once("config/database.php");

$email = $_SESSION['user_email'];
$key = $_GET['id'];
$sql1 = "SELECT * FROM `user` WHERE `user`.`user_id` = '{$key}'";
$sql2 = "SELECT * FROM `blogpost` INNER JOIN `user` ON `user`.`user_id` = '{$key}' AND `blogpost`.user_email = `user`.user_email AND `blogpost`.post_status != 'pending' AND `blogpost`.post_status != 'draft'";
$result1 = mysqli_query($con, $sql1);
$result2 = mysqli_query($con, $sql2);
foreach ($result1 as $d) :
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/css/dashboard.css">
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $d['user_name'] ?></title>
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow bg-dark fixed-top">
      <a class="navbar-brand" href="user.php">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="jumbotron rounded-0" style="background: linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,.5)), url(libs/img/<?= $d['user_profile'] ?>); min-height: 60vh; background-size: cover; background-position: center center; background-attachment: fixed;">
      <h1 class="display-2 text-white"><?= $d['user_name'] ?></h1>
      <hr>
      <h3 class="text-white"><?= $d['user_email'] ?></h3>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">

          <?php foreach ($result2 as $p) : ?>
            <div class="card my-3">
              <div class="card-body">
                <a href="all_post_view.php?post=<?= $p['post_id'] ?>&id=<?= $p['user_id'] ?>">
                  <h1><?= $p['post_title'] ?></h1>
                  <hr>
                </a>
                <p>Posted by: <img src="libs/img/<?= $d['user_profile'] ?>" width="25px" alt=""> at, <?= date('l, d M Y', $p['post_created']) ?></p>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>

  </body>

  </html>
<?php endforeach; ?>