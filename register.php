<?php

// session_start();
$error = "";
$passError = "";
include("Php/conn.php");


if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $userEmail = mysqli_real_escape_string($conn, $_POST['reg-email']);
  $password = mysqli_real_escape_string($conn, $_POST['reg-password']);
  $confirmPass = mysqli_real_escape_string($conn, $_POST['con-password']);
  // Hash password
  $hashPassword = md5($password);
  $hasConfirmPassword = md5($confirmPass);

  if (!empty($password) && !empty($confirmPass) && !empty($username) && !empty($userEmail)) {
    if (strlen($password) >= 6) {
      if ($hashPassword === $hasConfirmPassword) {
        // username existence checker  
        $sql = "SELECT username FROM customer WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if ($count > 0) { //if there is no username like the input
          $error = "Username already exist";
        } else {

          // username existence checker  
          $mysql = "SELECT email FROM customer WHERE email = '$userEmail'";
          $res = mysqli_query($conn, $mysql);
          $rows = mysqli_num_rows($res);

          if ($rows > 0) { //if there is no email like the input
            $error = "Email already Exist";
          } else {
            $sql = "INSERT INTO customer (username, email ,password) VALUES ('$username', '$userEmail', '$hashPassword')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              header("Location: login.php");
            }
          }
        }

      } else {
        $passError = "Password doesn't match";
      }
    } else {
      $passError = "Password needs to be more than 6 characters";
    }
  } else {
    $error = "Please fill the form!";
  }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="Css/modal.css" />
  <link rel="stylesheet" href="Css/style.css" />
  <link rel="website icon" href="Img/web-logo.png">

  <title>Register</title>
</head>
<body">
  <div class="container">
    <div class="row justify-content-center mt-5 p-5 shadow-lg rounded bg small fw-semibold">
      <div class="col-lg-6 col-md d-none d-md-block">
        <img src="Img/undraw_fans_re_cri3.svg" class="img-fluid" alt="">
      </div>

      <div class="col-lg-6 col-md-6 col-12">
        <form action="register.php" method="POST" class="px-lg-5">
          <p class="fs-2 my-5">Sign In</p>

          <p class="small font-weight-bold text-center text-danger">
            <?php echo $error; ?>
          </p>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control-plaintext mb-3 w-75" />
            <label for="reg-email">Email</label>
            <input type="email" name="reg-email" class="form-control-plaintext mb-3 w-75" />

            <p id="error" style="padding: 0; margin: 0;"
              class="small pt-2 text-danger font-weight-bold p-0 text-justify">
              <?php echo $passError; ?>
            </p>
            <label for="reg-password">Password</label>
            <input type="password" name="reg-password" id="password" class="form-control-plaintext mb-3 w-75" />

            <p style="padding: 0; margin: 0;" id="password-info" class="small p-0 text-justify text-info mb-3"> Your
              Password needs to be at least
              6 characters please make it secure</p>

            <label for="con-password">Confirm Password</label>
            <input type="password" name="con-password" class="form-control-plaintext mb-3 w-75" />

            <button type="submit" name="register" class="btn btn-success mt-4 w-50">
              Register
            </button>
          </div>
          <p class="mt-4">
            <a href="login.php" class="text-decoration text-primary fw-semibold mt-5 w-25">Already have an account?</a>
          </p>
        </form>
      </div>
    </div>

    <div class="d-flex justify-content-center m-5">
      <a href="index.php">
        <img src="Img/logo.png" alt="Our shop logo" width="150px">
      </a>
    </div>
  </div>
  </body>

</html>
