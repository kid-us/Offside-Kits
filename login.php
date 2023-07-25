<?php

session_start();
include("Php/conn.php");

$errorMsg = "";

if (isset($_POST['login'])) {
  $_SESSION['login_time'] = time();
  $userEmail = mysqli_real_escape_string($conn, $_POST['log-email']);
  $password = md5(mysqli_real_escape_string($conn, $_POST['log-password']));

  if (empty($userEmail) && empty($password)) {
    $errorMsg = "Please fill the form!";

  } else {
    $sql = "SELECT * FROM customer WHERE email ='$userEmail' AND password ='$password'";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $_SESSION['username'] = $row['username'];
      $_SESSION['email'] = $row['email'];
    }

    $count = mysqli_num_rows($result);

    if ($count == 1) {
      header("Location: index.php");
    } else {
      $errorMsg = "Email or Password is Incorrect";
    }
  }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/Img/log-ico.ico" type="image/x-icon">
  <!-- <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" /> -->
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="Css/style.css" />
  <link rel="stylesheet" href="Css/modal.css" />
  <link href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Login</title>
</head>

<body style="background-color: E0E0E0;">
  <div class="container">
    <div class="row justify-content-center mt-5 p-5 shadow-lg rounded bg-light small fw-semibold">
      <div class="col-lg-6 col-md-6 col-12">
        <form action="login.php" method="POST" class="px-lg-5">
          <p class="fs-2 my-5">Sign Up</p>

          <p class="small font-weight-bold text-center text-danger">
            <?php echo $errorMsg; ?>
          </p>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="log-email" class="form-control-plaintext w-75" />

            <label for="password" class="mt-4">Password</label>
            <input type="password" name="log-password" id="pass" class="form-control-plaintext w-75" />
            <input type="checkbox" id="show-password" class="form-check-inline mt-3" />
            <span class="small font-weight-bold">Show Password</span> <br />
            <button type="submit" name="login" class="btn btn-success  mt-5 w-25">
              Login
            </button>
          </div>

          <p class="mt-4">
            <a href="register.php" class="text-decoration text-primary fw-semibold mt-5 w-25">Register for free</a>
          </p>
        </form>
      </div>
      <div class="col-lg-6 col-md d-none d-md-block">
        <img src="Img/undraw_fans_re_cri3.svg" class="img-fluid" alt="">
      </div>
    </div>

    <div class="d-flex justify-content-center m-4">
      <a href="index.php">
        <img src="Img/logo.png" alt="Our shop logo " width="150">
      </a>
    </div>
  </div>
  <script src="JS/password.js"></script>
</body>

</html>
