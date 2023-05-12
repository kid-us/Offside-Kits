<?php

session_start();

include("Php/conn.php");

$error = "";
$errors = "";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

if(isset($_POST['done'])){
    
    $oldEmail = $_SESSION['email'];
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $user =  mysqli_real_escape_string($conn,$_POST['username']);
    $oldPassword = md5(mysqli_real_escape_string($conn, $_POST['old-password']));
    $newPassword =  (mysqli_real_escape_string($conn,$_POST['new-password']));

        if(empty($newPassword)){

            $mySql = "SELECT * FROM customer WHERE password = '$oldPassword' AND email = '$oldEmail'";
            $countResult = mysqli_query($conn, $mySql);
            $count = mysqli_num_rows($countResult);

            if($count==1){ //if password is correct

                $newsql = "SELECT username FROM customer WHERE username = '$user'";
                $results = mysqli_query($conn, $newsql);
                $counts = mysqli_num_rows($results);

                if($counts > 1){ //if there is no username like the input
                    $error = "Username or Email already exist ";
                }else{
                    $mysql = "SELECT email FROM customer WHERE email = '$email'";
                    $res = mysqli_query($conn, $mysql);
                    $rows = mysqli_num_rows($res);
    
                    if($rows > 1){ //if there is no email like the input
                      $error = "Username or Email already exist ";
                    }else{
                        $sql = "UPDATE customer SET email = '$email', username = '$user' WHERE password = '$oldPassword'";
                        $result = mysqli_query($conn, $sql);
                        if($result){ // if all is correct
                            $updateQuery = "UPDATE store SET customerEmail = '$email', customerName = '$user' WHERE customerEmail = '$oldEmail'";
                            mysqli_query($conn,$updateQuery);

                            header("Location:login.php?Successfully updated");
                            session_destroy();
                        }
                    }
                }
            }else{ // when password not correct
                $errors = "Invalid Password";
            }
                     
        }else{
            if(strlen($newPassword) < 6){
            $msg = "Password must be greater than 6 characters";
            }else{
                $mySql = "SELECT * FROM customer WHERE password = '$oldPassword' AND email = '$oldEmail'";
                $countResult = mysqli_query($conn, $mySql);
                $count = mysqli_num_rows($countResult);

                if($count==1){
                    $newsql = "SELECT username FROM customer WHERE username = '$user'";
                    $results = mysqli_query($conn, $newsql);
                    $counts = mysqli_num_rows($results);
    
                    if($counts > 1){ //if there is no username like the input
                        $error = "Username or Email already exist ";
                    }else{
                        $mysql = "SELECT email FROM customer WHERE email = '$email'";
                        $res = mysqli_query($conn, $mysql);
                        $rows = mysqli_num_rows($res);
        
                        if($rows > 1){ //if there is no email like the input
                          $error = "Username or Email already exist ";
                        }else{
                            $newPass  = md5($newPassword);
                            $sql = "UPDATE customer SET email = '$email', username = '$user', password = '$newPass' WHERE password = '$oldPassword'";
                            $result = mysqli_query($conn, $sql);
    
                            if($result){
                                $updateQuery = "UPDATE store SET customerEmail = '$email', customerName = '$user' WHERE customerName = '$oldUsername'";
                
                                mysqli_query($conn,$updateQuery);
                
                                header("Location:login.php?Successfully updated");
                                session_destroy();
                            }
                        }
                    }
                }else{
                    $errors= "Invalid Password";
                }
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
    <link rel="shortcut icon" href="/Img/profile-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="Css/style.css" / >
    <link rel="stylesheet" href="Css/modal.css" />

    <link
      href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body >
    <div class="container font-weight-bold">
    <?php include("modals.php")?>

    <ul class="mt-4">
        <li class="Navs"><a href="index.php"> <span class="mr-3"><img src="/Img/logo.png" alt="Our shop logo" width="150px"></span></a></li>
    <?php

        if(isset ($_SESSION['username'])){
            
            echo '<li class="Navs right mr-3"><p href="#"  id="user"> <span class="fa fa-user mr-1"></span>'.strtoupper( $_SESSION['username']).'</p></li>';

            echo
            '<li class="Navs right mr-3"><a href="/Php/logout.php" id="dash-sign-out" class="text-danger">Sign out </a></li>';
            
            echo
            '<li class="Navs right mr-3"><a href="status.php">Status</a></li>';
            // unset($_SESSION['username']);
            }
    ?>
    </ul>

   <hr style="background: 1px solid #000;">      

            <div style="background-color: #F5F5F5;" class="shadow-lg rounded text-center">
                <div>
                    <h4 class="left ml-4 pt-2 font-weight-bold">Profile <button  id="edit" style="width: 100px;" class="right btn btn-outline-info  ml-3 mr-3">Edit</button> <button id="cancel" class="right btn btn-danger hidden ">Cancel</button></h4>
                    
                    <hr style="background: 1px solid #000;">      


                     <form action="profile.php" method="POST" class="pt-3">
                         <p class="small text-danger"><?php echo $error; ?></p>
                      <div class="row justify-content-center ml-4 mb-4">

                        <div class="col-lg-3 col-sm-12 font-weight-bold">
                            <label for="">Email</label>  
                        </div>
    
                        <div class="col-lg-7 col-sm-12 mb-5">
                            <input id="email" type="email" name="email" class="form-control font-weight-bold bg-info text-light" disabled value="<?php echo $_SESSION['email'];?>">
                        </div>

                        <div class="col-lg-3 col-sm-12 font-weight-bold">
                            <label for="Username">Username</label>
                        </div>
                        <div class="col-lg-7 col-sm-12 mb-5">
                            <input id="username" type="text" name="username" class="form-control font-weight-bold bg-info text-light" disabled value="<?php echo $_SESSION['username'];?>" required>
                        </div>

                        <div class="col-lg-3 col-sm-4 font-weight-bold">
                            <label for="Password">Password</label>
                        </div>

                        <div class="col-lg-7 col-sm-8 mb-5">
                            <a id="change-text" class="small hidden font-weight-bold" style="cursor: pointer;">Also Change Password?</a>

                            <input id="input-password" type="password" name="old-password" class="form-control mb-3 font-weight-bold bg-info text-light" value="00000000000"  placeholder="current-password"
                            disabled
                            required>
                            <p class="small text-danger"><?php echo $errors; ?></p>
                            <input id="new-password" type="password" name="new-password" class="form-control font-weight-bold bg-info text-light hidden" placeholder="New Password">

                            <small id="pass-info" class="hidden"> Your Password needs to be at least 6 characters please make it secure</small>
                        </div>

                        <div class="offset-3 col-lg-7 col-sm-12 mb-5">
                            <button id="done" type="submit" disabled name="done" class="btn btn-danger w-25">Done</button>
                        </div>
                     </div>
                    </form>
                </div>
            </div>
            <?php include("footer.php")?>
    </div>
    <script src="JS/jar.amd.min.js"></script>
    <script src="JS/dash.js"></script>
    <script src="JS/modals.js"></script>
</body>
</html>
