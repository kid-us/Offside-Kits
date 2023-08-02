<?php

session_start();
unset($_SESSION['name']);
include("Php/conn.php");

$msg = '';

if (isset($_POST['login'])) {
  $_SESSION['last_login_time'] = time();

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5(mysqli_real_escape_string($conn, $_POST['password']));

  $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$pass'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  //  while($row){
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    $msg = 'Logged in';
    //  echo "User Name: {$row['username']}";
    $adminName = "{$row['username']}";
    $_SESSION['name'] = $adminName;
    header("Location: admin.php?Successfully Logged In ");
  } else {
    $msg = "Incorrect Email or Password";
  }
  // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="Css/admin.css" />
  <link rel="website icon" href="Img/web-logo.png">
  <title>Admin Login</title>
</head>

<body>
  <div class="container mt-5 p-5">
    <div class="row justify-content-center bg shadow-lg p-5 rounded fw-semibold small">
      <p class="fs-5">Login Our Admin</p>
      <div class="col-6 mt-5">
        <form action="adminlog.php" method="POST">

          <p class="text-center text-danger">
            <?Php echo $msg; ?>
          </p>

          <label for="email">Email</label>
          <input type="email" name="email" class="form-control-plaintext w-75 my-3" />
          <label for="email">Password</label>
          <input type="password" name="password" id="pass" class="form-control-plaintext w-75 my-3" />
          <input type="checkbox" id="show-password" class="form-check-inline mt-3 ml-5" />
          <span class="small">Show Password</span> <br />
          <button type="submit" name="login" class="btn btn-success mt-5 w-25">
            Login
          </button>
        </form>
      </div>

      <div class="col-6 mt-5">
        <img src="Img/admin.svg" alt="" class="img-fluid">
      </div>
    </div>
  </div>
  <!-- <script src="/accountPage.js"></script> -->
  <script src="JS/password.js"></script>
</body>

</html>
