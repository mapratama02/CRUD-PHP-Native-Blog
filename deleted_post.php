<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header("location: login.php?acces_denied");
}

include_once("config/database.php");
$author = $_SESSION['user_email'];

$query = "SELECT * FROM `deleted_post` WHERE `user_email` = '{$author}'";
$no = 0;

$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <meta http-equiv="refresh" content="2"> -->
  <link rel="stylesheet" href="libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/css/dashboard.css">
  <link rel="stylesheet" href="libs/FontAwesome/css/all.min.css">
  <!-- <link rel="stylesheet" href="plugins/Datatables/datatables.min.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css" /> -->
  <script type="text/javascript" src="libs/js/jquery.min.js"></script>
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
        <h1>Post</h1>
        <hr>

        <div class="card">
          <div class="card-body">

            <table class="table table-hover table-light rounded">
              <thead class="" style="background: #ddd">
                <th class="text-center">No</th>
                <th>Title</th>
                <!-- <th>Author</th> -->
                <!-- <th>Image</th> -->
                <th>Status</th>
                <th colspan="4">Action</th>
              </thead>
              <tfoot class="" style="background: #ddd">
                <th class="text-center">No</th>
                <th>Title</th>
                <!-- <th>Author</th> -->
                <!-- <th>Image</th> -->
                <th>Status</th>
                <th colspan="4">Action</th>
              </tfoot>
              <tbody>
                <?php foreach ($result as $d) : ?>
                  <?php $no++ ?>
                  <tr>
                    <th class="text-center align-middle"><?= $no ?></th>
                    <td class="align-middle"><?= $d['post_title'] ?></td>
                    <!-- <td><?= $d['author'] ?></td> -->
                    <!-- <td><img src="libs/img/<?= $d['post_header'] ?>" class="img-thumbnail" alt=""></td> -->
                    <td class="align-middle"><?= $d['post_status'] ?></td>
                    <td class="text-center align-middle"><a href="action_delete.php?id=<?= $d['post_id'] ?>" onclick="return confirm('Delete permanantly this data?')" class="btn rounded-0 btn-block btn-danger"><i class="fa fa-trash"></i></a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <?php if ($no > 0) : ?>
              <div class="alert alert-info rounded-0" role="alert">
                <span>Ada <b><?= $no ?></b> Data</span>
              </div>
            <?php else : ?>
              <div class="alert alert-info" role="alert">
                <span>Tidak ada data</span>
              </div>
            <?php endif; ?>

          </div>
        </div>

      </div>

    </div>
  </div>

</body>

<script src="libs/js/popper.min.js"></script>
<script src="libs/js/bootstrap.min.js"></script>
<script src="plugins/ckeditor/ckeditor.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> -->

<script>
  $(function() {
    CKEDITOR.replace('editor');
  });
</script>

</html>