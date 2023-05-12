<?php

session_start();
include("Php/insert.php");
// include ("Php/bootInsert.php");
if(isset($_SESSION['name'])){
  $admin = $_SESSION['name'];
  if( time() - $_SESSION['last_login_time'] > 2700){
    header("Location: adminlog.php");
  }
}


// if(isset($admin) && time() - )

if(empty($admin)){
  unset($admin);
  header("Location: adminlog.php");
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
    <!-- <link rel="stylesheet" href="/Css/modal.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap"
      rel="stylesheet"
    />
    <title>Admin Page</title>
  </head>
  <style>
    body {
      background-color: rgb(230, 230, 230);
      font-family: "Grape Nuts", cursive;
      font-size: larger;

    }
    .form-control-plaintext {
      width: 270px;
      outline: 0;
      border-bottom: 1px solid #222;
    }
    li {
      list-style: none;
      display: inline;
    }
    .hidden{
      display: none;
    }
  </style>
  <body>
    <div class="container">
      <ul class="mt-3">
        <li><a href="index.php"><img src="img/logo.png" alt="my shop logo" width="150px"></a></li>
        <li class="mr-3 font-weight-bold ml-3"> <i class="fa fa-user-o text-danger"></i> <?php echo $admin;?> </li>
        <li><a href="/Php/adminlogout.php" class="fa fa-power-off"></a></li>
        
        <li class="Navs float-right  pr-5"><a href="store.php"><img src="/Img/store.png" alt="store image" width="45px"></a></li>
      </ul>

      <p class="text-center font-weight-bold text-danger"><?php echo $invalidMsg;?></p>
      <p class="text-center font-weight-bold text-success"><?php echo $validMsg;?></p>

    <div class="row justify-content-center shadow-lg rounded">
      <div class="col-sm-12 col-md-12 col-lg-12">

        <form
          action="admin.php"
          method="POST"
          enctype="multipart/form-data"
          
        >
          <p class="pt-5">Please select what you are going to upload</p>
    
          <input
            type="radio"
            name="item"
            id="national"
            class="ml-5"
            value="national"
            required
          />
          National Kit
    
          <input
            type="radio"
            name="item"
            id="clubs"
            class="ml-5 mb-4"
            required
            value="clubs"
          />
          Clubs Kit
    
          <input
            type="radio"
            name="item"
            id="boots"
            class="ml-5"
            value="boots"
            required
          />
          Boots <br />
    
          <div class="form-inline">
            <label for="Name" class="font-weight-bold">Name : </label>
            <input
              type="text"
              name="item-name"
              class="form-control-plaintext ml-2 mb-4"
              required
            />
            <br />
          </div>
          <div class="form-inline mb-4">
            <label for="Price" class="font-weight-bold">Price : </label>
            <input
              type="text"
              name="item-price"
              class="form-control-plaintext ml-3 mb-4"
              required
            />
            <br />
          </div>
    

          <span class="small text-dark bg-info p-2 rounded font-weight-bold">Remember Pictures or Photos must be .png type to be Uploaded</span> <br>

          <input type="file" name="file" class="mb-4 mt-3" required /> <br />
          <button
            type="submit"
            name="upload"
            class="btn btn-warning w-25 mb-5 mt-3"
          >
            Upload
          </button>
        </form>
      </div>
    </div>

    </div>
    <!-- <script src="JS/adminDescription.js"></script> -->
  </body>
</html>
