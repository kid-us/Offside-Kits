<?php

session_start();
include ("Php/conn.php");

$errorMsg = "";

if (isset($_POST['login'])){
    $_SESSION['login_time'] = time();
    $userEmail = mysqli_real_escape_string($conn, $_POST['log-email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['log-password']));

    if (empty($userEmail) && empty($password)){
        $errorMsg =  "Please fill the form!";

    }else{
      $sql = "SELECT * FROM customer WHERE email ='$userEmail' AND password ='$password'";

      $result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
      } 

      $count = mysqli_num_rows($result);

      if($count==1){
        header("Location: index.php");
      }else{
        $errorMsg =  "Email or Password is Incorrect";
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
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="Css/style.css" / >
    <link rel="stylesheet" href="Css/modal.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body style="background-color: E0E0E0;">
    <div class="container">
      <div class="d-flex justify-content-center mt-5">

        <div id="login-style" class="shadow-lg rounded">
          <form action="login.php" method="POST">
          <div class="text-center ">
            <img src="Img/login.png" alt="" width="50px" />
            <br />
  
            <a href="#" class="btn btns mt-4 w-25  bg-info pt-2 text-light" >Login</a>
  
            <a href="register.php" class="btn btn-outline-secondary font-weight-bold mt-4 w-25">
              Register
            </a>
          </div>
          <br />
          <p class="small font-weight-bold text-center text-danger"><?php echo $errorMsg;?></p>
  
          <div class="form-group">
            <input
              type="email"
              name="log-email"
              class="form-control-plaintext ml-5 w-75"
              placeholder="Email"
            />
            <input
              type="password"
              name="log-password"
              id="pass"
              class="form-control-plaintext ml-5 w-75"
              placeholder="Password"
            />
            <input
              type="checkbox"
              id="show-password"
              class="form-check-inline mt-3 ml-5"
            />
            <span class="small font-weight-bold text-primary">Show Password</span> <br />
            <button
              type="submit"
              name="login"
              class="btn btn-outline-success float-right mr-5 mt-4 w-25"
            >
              Login
            </button>
          </div>
          </form>
        </div>
      </div>
      <div class="d-flex justify-content-center m-4">
        <a href="index.php">
          <img src="/Img/logo.png" alt="Our shop logo " width="150">
        </a>
      </div>
    </div>
    <script src="JS/password.js"></script>
</body>
</html>