<?php

// session_start();
$error = "";
$passError = "";
include ("Php/conn.php");


if (isset($_POST['register'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userEmail = mysqli_real_escape_string($conn, $_POST['reg-email']);
    $password =  mysqli_real_escape_string($conn,$_POST['reg-password']);
    $confirmPass = mysqli_real_escape_string($conn, $_POST['con-password']);
    // Hash password
    $hashPassword = md5($password);
    $hasConfirmPassword = md5($confirmPass);

    if (!empty($password) && !empty($confirmPass) && !empty($username) && !empty($userEmail)){
        if(strlen($password) >= 6){
            if($hashPassword === $hasConfirmPassword){
              // username existence checker  
              $sql = "SELECT username FROM customer WHERE username = '$username'";
              $result = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($result);

              if($count > 0){ //if there is no username like the input
                $error = "Username already exist";
              }else{
                
              // username existence checker  
                $mysql = "SELECT email FROM customer WHERE email = '$userEmail'";
                $res = mysqli_query($conn, $mysql);
                $rows = mysqli_num_rows($res);

                if($rows > 0){ //if there is no email like the input
                  $error = "Email already Exist";
                }else{
                  $sql = "INSERT INTO customer (username, email ,password) VALUES ('$username', '$userEmail', '$hashPassword')";
                  $result = mysqli_query($conn, $sql);
                  if($result){
                      header("Location: login.php");
                  }
                }
              }
              
            }else{
              $passError = "Password doesn't match";
            }
        }else{
          $passError = "Password needs to be more than 6 characters";
        }
    }else{
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
    <link rel="shortcut icon" href="/Img/reg-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="Css/modal.css" />
    <link rel="stylesheet" href="Css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap"
      rel="stylesheet"
    />

    <title>Register</title>
</head>
<body">
    <div class="container">

    <div class="d-flex justify-content-center mt-5">

      <div id="register-style" class="shadow-lg rounded">
      <form action="register.php" method="POST">
          <div class="text-center">
            <img src="Img/register.png" alt="" width="50px" />
            <br />
            <a href="login.php" class="btn btn-outline-secondary mt-4 w-25 font-weight-bold" >Login</a>
            <a type="button" class="btn btns mt-4 w-25 bg-info pt-2 text-light" id="register">
              Register
            </a>
          </div>
          <br />
  
          <p class="small font-weight-bold text-center text-danger"><?php echo $error;?></p>
  
          <div class="form-group">
            <input
              type="text"
              name="username"
              class="form-control-plaintext ml-5 w-75"
              placeholder="Username"
            />
            <input
              type="email"
              name="reg-email"
              class="form-control-plaintext ml-5 w-75"
              placeholder="Email"
              />
              
              <p id="error" style="padding: 0; margin: 0;" class="small pt-2 text-danger font-weight-bold mr-5 ml-5 p-0 text-justify"> <?php echo $passError;?></p>
  
              <input
              type="password"
              name="reg-password"
              id="password"
              class="form-control-plaintext w-75 ml-5"
              placeholder="Password"
              />
  
              <p style="padding: 0; margin: 0;" id="password-info" class="small mr-5 ml-5 p-0 text-justify text-primary font-weight-bold"> Your Password needs to be at least 6 characters please make it secure</p>
  
              <input
              type="password"
              name="con-password"
              class="form-control-plaintext w-75 ml-5"
              placeholder="Confirm Password"
              />
  
            <button
              type="submit"
              name="register"
              class="btn btn-outline-danger float-right mr-5 mt-4 w-25"
            >
              Register
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="d-flex justify-content-center m-5">
      <a href="index.php">
        <img src="/Img/logo.png" alt="Our shop logo" width="150px">
      </a>
    </div>
    </div>
</body>
</html>