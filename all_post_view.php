<?php
session_start();
include_once("config/database.php");

$email = $_SESSION['user_email'];

$key = $_GET['post'];
$id = $_GET['id'];
$sql = "SELECT * FROM `blogpost` INNER JOIN `user` ON `blogpost`.post_id = '{$key}' AND `user`.`user_id` = '{$id}'";
$result = mysqli_query($con, $sql); ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="libs/css/dashboard.css">
  <link rel="stylesheet" href="libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/FontAwesome/css/all.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<?php foreach ($result as $r) : ?>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
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

    <div class="card border-0 shadow blog">
      <div class="card-img-top d-flex px-5 align-items-center text-white" style="background: linear-gradient(rgba(25,25,112,.75), rgba(0,0,0,.5)), url(libs/img/<?= $r['post_header'] ?>); min-height: 75vh; background-size: cover; background-position: center center; background-attachment: fixed;">
        <div class="">
          <h1 class="m-0 display-3"><?= $r['post_title'] ?></h1>
          <p class="lead">Posted by <img src="libs/img/<?= $r['user_profile'] ?>" class="" width="50px" alt=""></p>
        </div>
      </div>
      <div class="card-body py-5">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 blog-content">
              <?= $r['post_content'] ?>

              <?php if ($r['post_status_comment'] == 1) : ?>
                <div class="card">
                  <div class="card-body">
                    <h1>Comment</h1>
                    <hr>

                    <form action="" method="post">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                          </div>
                          <input type="text" name="name" class="form-control" placeholder="Name..." id="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                          </div>
                          <input type="email" name="email" class="form-control" placeholder="Email Address..." id="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-pen"></i></div>
                          </div>
                          <textarea name="comment" id="" class="form-control" cols="30" rows="5" placeholder="Your Comment..."></textarea>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>

                  </div>
                </div>
              <?php endif; ?>
              <?php if ($r['post_status_comment'] == 0) : ?>
                <div class="card mt-5">
                  <div class="card-body">
                    <p class="m-0">Comment are disabled for this content.</p>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

      </div>
      <div class="card-footer text-center text-white border-0" style="background: linear-gradient(royalblue, mediumslateblue)">
        <span><img src="libs/img/<?= $r['user_profile'] ?>" width="50px" alt=""> <?= $r['user_name'] ?>, <?= date('l, d M Y', $r['post_created']) ?></span>
      </div>
    </div>

    <script src="libs/js/jquery.min.js"></script>
    <script src="libs/js/popper.min.js"></script>
    <script src="libs/js/bootstrap.min.js"></script>
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="plugins/ckeditor/ckeditor.js"></script>

    <script>
      $(function() {
        CKEDITOR.replace('editor');
      });
    </script>
  </body>


<?php endforeach; ?>

</html>