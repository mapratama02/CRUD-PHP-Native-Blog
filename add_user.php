<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header("location: login.php?acces_denied");
}
if ($_SESSION['user_role'] != 1) {
  header("location: user.php?acces_denied");
}

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
        <h1>Add new user</h1>
        <hr>

        <div class="row">
          <div class="col-md-8">

            <form action="action_add_user.php" method="post" enctype="multipart/form-data">

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="name" class="col-form-label">User name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="name" id="name" class="form-control" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="email" class="col-form-label">User email</label>
                </div>
                <div class="col-md-9">
                  <input type="email" name="email" id="email" class="form-control" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password" class="col-form-label">User password</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="password" id="password" class="form-control" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="role" class="col-form-label">User role</label>
                </div>
                <div class="col-md-9">
                  <select name="role" id="role" class="form-control">
                    <option value="1">Administrator</option>
                    <option value="2">User</option>
                    <option value="3">Writter</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-9 offset-md-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>

            </form>

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

  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>

</html>