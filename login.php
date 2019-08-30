<?php
session_start();
if (isset($_SESSION['user_email'])) {
  header("location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/css/style.css">
  <title>Login Session</title>
</head>

<body>

  <div id="loginPage">
    <div id="box">

      <div class="card rounded-0 shadow">
        <div class="card-header bg-transparent text-center">
          <h4>Login</h4>
        </div>
        <div class="card-body">

          <?php if (isset($_GET['acces_denied'])) : ?>
            <div class="alert alert-danger" role="alert">
              You didn't login yet!
            </div>
          <?php endif; ?>

          <?php if (isset($_GET['incorrect'])) : ?>
            <div class="alert alert-danger" role="alert">
              Username or Password is false!
            </div>
          <?php endif; ?>

          <form action="login_action.php" method="POST">
            <div class="form-group">
              <input type="text" name="email" placeholder="Email..." class="form-control rounded-0">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password..." class="form-control rounded-0">
            </div>
            <input type="submit" value="Login" class="btn btn-primary btn-block rounded-0">
          </form>
          <hr>
          <p class="m-0"><small>Doesn't have an account yet? <a href="register.php">Create one!</a></small></p>
        </div>
        <div class="card-footer bg-transparent text-center">
          <span><small>Done by: Muhmmad Anugrah Pratama</small></span>
        </div>
      </div>

    </div>
  </div>

</body>

</html>