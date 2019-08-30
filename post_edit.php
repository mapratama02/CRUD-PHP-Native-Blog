<?php
session_start();
if (!isset($_SESSION['user_email'])) {
  header("location: login.php?acces_denied");
}

include_once("config/database.php");

$key = $_GET['id'];
$sql = "SELECT * FROM `blogpost` WHERE `post_id` = '{$key}'";
$result = mysqli_query($con, $sql);
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
        <h1>Edit Post</h1>
        <hr>

        <div class="row">
          <div class="col-md-8">
            <?php foreach ($result as $r) : ?>
              <form action="action_post_edit.php" enctype="multipart/form-data" method="POST">

                <input type="hidden" name="author" value="<?= $_SESSION['user_email'] ?>" id="">
                <input type="hidden" name="id" value="<?= $r['post_id'] ?>">

                <div class="form-group row">
                  <div class="col-md-3">
                    <label for="title" class="col-form-label">Title</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="post_title" value="<?= $r['post_title'] ?>" class="form-control" id="title">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3">
                    <label for="content" class="col-form-label">Content</label>
                  </div>
                  <div class="col-md-9">
                    <textarea name="post_content" id="editor" cols="30" rows="10"><?= $r['post_content'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3">
                    <label for="header" class="col-form-label">Image header</label>
                  </div>
                  <div class="col-md-5">
                    <input type="file" name="post_header" id="header" class="form-control-file">
                  </div>
                  <div class="col-md-4 align-items-center">
                    <img src="libs/img/<?= $r['post_header'] ?>" width="100%" class="img-thumbnail" alt="">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3">
                    <label for="status" class="col-form-label">Status</label>
                  </div>
                  <div class="col-md-9">
                    <select name="post_status" id="status" class="form-control">
                      <option value="ready" <?php if ($r['post_status'] == 'ready') : ?> selected <?php endif; ?>>Ready</option>
                      <option value="pending" <?php if ($r['post_status'] == 'pending') : ?> selected <?php endif; ?>>Pending</option>
                      <option value="draft" <?php if ($r['post_status'] == 'draft') : ?> selected <?php endif; ?>>Draft</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-3">
                    <label for="" class="col-form-label">Comment status</label>
                  </div>
                  <div class="col-md-9">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" <?php if ($r['post_status_comment'] == 1) : ?> checked <?php endif; ?> type="radio" name="comment_status" id="inlineRadio1" value="1">
                      <label class="form-check-label" for="inlineRadio1">Enable</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" <?php if ($r['post_status_comment'] == 0) : ?> checked <?php endif; ?> type="radio" name="comment_status" id="inlineRadio2" value="0">
                      <label class="form-check-label" for="inlineRadio2">Disable</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-9 offset-md-3">
                    <button type="submit" onclick="return confirm('Post this?')" class="btn btn-primary">Post</button>
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