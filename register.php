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

  <div id="registerPage">
    <div id="box">

      <div class="card rounded-0 shadow">
        <div class="card-header bg-transparent text-center">
          <h4>Register</h4>
        </div>
        <div class="card-body">
          <form action="register_action.php" method="POST">
            <div class="form-group">
              <input type="text" name="name" placeholder="Your name..." class="form-control rounded-0">
            </div>
            <div class="form-group">
              <input type="email" name="email" placeholder="Your Email..." class="form-control rounded-0">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Your password..." class="form-control rounded-0">
            </div>
            <input type="submit" value="Register" class="btn btn-primary btn-block rounded-0">
          </form>
          <hr>
          <p class="m-0"><small>Already have an account? <a href="login.php">Log in!</a></small></p>
        </div>
        <div class="card-footer bg-transparent text-center">
          <span><small>Done by: Muhmmad Anugrah Pratama</small></span>
        </div>
      </div>

    </div>
  </div>

</body>

</html>