
<?php

session_start();
unset($_SESSION['name']);
include ("Php/conn.php");

$msg = '';

if (isset($_POST['login'])){
  $_SESSION['last_login_time'] = time();

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5(mysqli_real_escape_string($conn,$_POST['password']));

    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$pass'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //  while($row){
        $count = mysqli_num_rows($result);
        if($count == 1){
          $msg  = 'Logged in';
        //  echo "User Name: {$row['username']}";
          $adminName =  "{$row['username']}";
          $_SESSION['name'] = $adminName;
          header("Location: admin.php?Successfully Logged In ");
        }else{
          $msg =  "Incorrect Email or Password";
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
    <link rel="shortcut icon" href="/Img/admin-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="Css/admin.css" />
    <title>Admin</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12 mt-5"></div>

        <form action="adminlog.php" method="POST" class="shadow-lg">
          <div class="text-center">
            <img src="Img/programmer.png" alt="" width="60px" />
            <br />
            <p class="btn btn-info mt-4 w-50">
              Admin Login
            </p>
          </div>
          <br />

          <p class="text-center text-danger">
            <?Php echo $msg ;?>
          </p>

          <input
            type="email"
            name="email"
            class="form-control-plaintext ml-5 w-75"
            placeholder="Email"
          />
          <input
            type="password"
            name="password"
            id="pass"
            class="form-control-plaintext ml-5 w-75"
            placeholder="Password"
          />
         

          <input
            type="checkbox"
            id="show-password"
            class="form-check-inline mt-3 ml-5"
          />
          <span class="small">Show Password</span>  <br />
          <button
            type="submit"
            name="login"
            class="btn btn-outline-success ml-5 mt-3 w-25"
          >
            Login
          </button>
        </form>
      </div>
    </div>
    <!-- <script src="/accountPage.js"></script> -->
    <script src="JS/password.js"></script>
  </body>
</html>
