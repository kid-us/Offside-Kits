<?php

require_once('vendor/autoload.php');
include ("Php/conn.php");
session_start();

if(isset ($_SESSION['message'])){
  echo '<script src="JS/sweetalert2.all.min.js"></script>';
  echo "<script>document.addEventListener('DOMContentLoaded', function(e) {Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Ordered Successfully',
    text: 'We thank you for choosing us',
    color: 'red',
    background: '#FCE4EC',
    showConfirmButton: false,
    timer: 5500,
  })
})</script>";
  unset($_SESSION['message']);
}

include("Php/conn.php");

    $pageNum = 9;

    if (isset($_GET["page"])){
        $page =$_GET["page"];
    }
    else{
        $page =1;
    }

    $start_from = ($page-1)*$pageNum;
    $sql = "SELECT * FROM national  ORDER BY id DESC LIMIT $start_from, $pageNum";
    $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/Img/cart-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="Css/style.css"/>
    <link rel="stylesheet" href="Css/modal.css"/>
    <link
      href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap"
      rel="stylesheet"
    />

    <!-- Animated scrollbar link -->
    <link rel="stylesheet" href="Css/aos.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- carousel link -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Offside football store</title>
  </head>
  <body>
    <!-- Full Content of the Website -->
    <div class="container font-weight-bold" >
      <?php include("modals.php")?>
      
<!-- hidden in only small devices -->
<div class="d-none d-md-block ">
  <ul class="m-4">
    <li class="Navs"><a href="index.php"> <span class="mr-3"><img src="/Img/logo.png" alt="Our shop logo" width="150px"></span></a></li>
      
      <?php
      if(isset ($_SESSION['username'])){
          if(time() - $_SESSION['login_time'] > 7200){
            header("Location: Php/logout.php");
          }
        echo '<li class="Navs right ml-2"><a href="#"  id="user-log-reg-profile">'.strtoupper($_SESSION['username']).'<span class="fa fa-user ml-1"></span></a></li>';
        // unset($_SESSION['username']);
      }else{
        
        echo '
        <li class="Navs right"><a href="#" id="user-log-reg-profile">Accounts <span id="arrow">⇣</span></a></li>';
      }

      // unset($_SESSION['message']);
      ?>

    <li class=" mr-2 right btn">
      <img src="Img/Search.png" width="18px" alt="">
    </li>

    <li class="right"> 
      <input type="search" id="search" class="form-control-plaintext w-100" placeholder="Enter keywords"> 
    </li>


<!-- Account modal -->
      <div  id="accounts-page" class="row justify-content-center hidden">
        <div style="position:absolute; z-index: 1;" class="offset-md-7 offset-lg-8 offset-xl-8 col-md-2 col-lg-2 col-xl-2 shadow-lg bg-light rounded p-3">
          <a href="login.php">Login</a> <br>
          <hr style="background: 1px solid #000; margin: 5px; padding: 0">
          <a href="register.php">Register</a>
        </div>
      </div>
    
     <!-- DASHBOARD MODAL -->
      <div class="row">
        <div style="position:absolute; z-index: 1;" id="dashboard" class="w-25 bg-light offset-md-7 offset-lg-8 offset-xl-8 col-md-2 col-lg-2 col-xl-2 shadow-lg rounded hidden pt-3">
        
         <a href="profile.php" class="dash-link ml-3 w-25">Profile</a> <br>
         <a href="status.php" class="dash-link ml-3 w-25">Status</a> <br>
         <hr style="background: 1px solid #000; padding:2px; margin:0;">

         <a href="Php/logout.php" id="account-sign-out" class="dash-link ml-3 small font-weight-bold text-danger">Sign Out</a>
       </div>
      </div>
  </ul>
  <!-- other device not small device search result container -->
  <div id="search-item"></div> 

  <div class="row justify-content-center mt-5">
    <ul class="font-weight-bold">
      <li>
        <a href="index.php" class="text-danger" id="national">National  <span><img src="/Img/national.png" alt="" width="20px"></span></a>
      </li>
      <li class="ml-3" id="club">
        <a href="clubs.php">Club Teams  <span><img src="/Img/club.png" alt="" width="20px"></span></a>
      </li>
      <li class="ml-3" id="boots"><a href="boots.php">Boots <span><img src="/Img/boot.png" alt="" width="20px"></span></a></li> 
      <a href="cart.php" id="show" class="" title="Cart">
        <img src="Img/side cart.png" alt="" width="28px" class="ml-4" />
        <span
          id="badge-counter"
          class="badge bg-danger text-light rounded-circle"
          ></span
        >
      </a>
    </ul>
  </div>
</div>

<!-- display only in small devices -->
<div  class="d-block d-md-none">
  <ul class="mt-4 mb-5">

    <li class="Navs"><a href="index.php"> <span class="mr-2"><img src="/Img/logo.png" alt="" width="150px"></span></a></li>

    <li class="Navs right"><a href="#" id="click-me"><img src="/Img/5.png" width="26px" class=""></img></a></li>

    <li class="Navs right">
      <button class="btns mr-4 shadow-lg" id="search-btn"><span class="fa fa-search"></span></button>
    </li>
    
    <li class="Navs right">
    <input type="search" id="search-small" class="form-control-plaintext hidden" placeholder="Enter keywords"> 
    </li>

    <li id="cart-link" class="Navs fixed-bottom pb-5 rounded">
      <a href="cart.php" class="pr-4" title="Cart">
        <img src="Img/side cart.png" alt="" width="40px" class="ml-4" />
        <span
          id="badged"
          class="badge bg-danger text-light rounded-circle"
          ></span
        >
      </a>
    </li>
  </ul>
      
  <div id="menu-page" class="shadow-lg rounded hidden">
    <ul class="font-weight-bold">
       <?php
      if(isset ($_SESSION['username'])){
        if(time() - $_SESSION['login_time'] > 7200){
          header("Location: Php/logout.php");
        }
        echo '<li class="text-warning font-weight-bold bg-dark p-4 rounded">'.strtoupper($_SESSION['username']).'<span class="fa fa-user ml-1"></span></li>';

        echo '<li class="menu pt-4 pr-5"><a href="status.php"  >Status</a></li>';

        echo '<li class="menu pt-4 pr-5"><a href="profile.php"  >Profile</a></li>';

        echo '<li class="menu pt-4 pr-5"><a href="Php/logout.php"  >Sign out</a></li>';

        // unset($_SESSION['username']);
      }else{

        echo '
        <li class="menu pt-4 pr-5"><a href="login.php">Login</a></li>';

        echo '<li class="menu pt-4 pr-5"><a href="register.php" >Register</a></li>';
      }

      // unset($_SESSION['message']);
      ?>

      <li class="menu pt-4 p-2 pr-5">
        <a href="#" class="text-danger" id="national-menu">National  <span><img src="/Img/national.png" alt="" width="20px"></span></a>
      </li>
      <li class="menu p-2 pr-5" id="club-menu">
        <a href="clubs.php">Club Teams  <span><img src="/Img/club.png" alt="" width="20px"></span></a>
      </li >
      <li class="menu pb-4 p-2 pr-5" id="boots-menu"><a href="boots.php">Boots <span><img src="/Img/boot.png" alt="" width="20px"></span></a></li> 
    </ul>
  </div>

  <div id="search-items"></div> 
  <!-- on small device search result container -->

</div>
<!-- small device display end -->

      <!-- Carousel view -->
      <div
        id="demo"
        class="carousel slide text-center shadow-lg rounded"
        data-ride="carousel"
      >
        <!-- Indicator -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
          <li data-target="#demo" data-slide-to="3"></li>
          <li data-target="#demo" data-slide-to="4"></li>
          <li data-target="#demo" data-slide-to="5"></li>
          <li data-target="#demo" data-slide-to="6"></li>
          <li data-target="#demo" data-slide-to="7"></li>
        </ul>
        <!-- Slideshow -->
        <div class="carousel-inner rounded">
          <div class="carousel-item active">
            <img
              src="Img/slideshow/arg.jpg"
              alt="Upcoming"
              width="100%"
              height="50%"
            />
          </div>
          <div class="carousel-item">
            <img
              src="Img/slideshow/bra.jpg"
              alt="Upcoming"
              width="100%"
              height="50%"
            />
          </div>
          <div class="carousel-item">
            <img
              src="Img/slideshow/por.jpg"
              alt="Upcoming"
              width="100%"
              height="50%"
            />
          </div>
          <div class="carousel-item">
            <img
              src="Img/slideshow/colo.jpg"
              alt="Upcoming"
              width="100%"
              height="50%"
            />
          </div>
          <div class="carousel-item">
            <img
              src="Img/slideshow/eng.jpg"
              alt="Upcoming"
              width="100%"
              height="50%"
            />
          </div>
          <div class="carousel-item">
            <img
              src="Img/slideshow/aut.jpg"
              alt="Upcoming"
              width="100%"
              height="50%"
            />
          </div>
          <div class="carousel-item">
            <img
              src="Img/slideshow/fra.jpg"
              alt="Upcoming"
              width="100%"
              height="50%"
            />
          </div>
        </div>

        <!-- Left and Right controls -->
        <a href="#demo" data-slide="prev" class="carousel-control-prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a href="#demo" data-slide="next" class="carousel-control-next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
      <!-- Carousel view end -->

      <h5 class="mt-5 font-weight-bold ">Here We Go National Kits</h5>
      <!-- nation page -->
      <div id="nation-page" class="row text-center mt-5">
      <?php
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];

       

       ?>
        <div class="col-lg-4 col-sm-12 col-md-6 mb-5" data-aos="fade-up"
     data-aos-duration="2000">
        
          <form action="payment.php" method="POST">
            <input type="text" name="item-name" hidden value="<?php echo$name;?>"  readonly >
            <input type="text" name="item-price" hidden value="<?php echo$price."$";?>" readonly>
            <input type="text" name="image" hidden value="<?php echo$image?>">
            <div class="shadow-lg bg-light rounded-lg">
          <img src="<?php echo $image;?>" 
                alt="" width="65%" id="ma"
                class="mt-5"/>

          <p class="name">  <?php echo $name; ?></p>
          <span
            class="p-2 mr-5 text-light bg-info font-weight rounded"
            > <?php echo $price."$";
             ?>
          </span>
          <a  class="cart ml-5" title="Add to cart">
            <img
              src="Img/cart.png"
              width="35px"
              data-name="<?php echo $name;?>"
              data-price="<?php echo $price."$";?>"
              data-image="<?php echo $image;?>"
              data-added="0"
            />
          </a>
          <br />

            <button type="submit" name="shop-btn" class="shop-btn btn btn-outline-danger ml-2 mt-4 rounded-pill" 
            >Shop Now</button>
        
          <br />
          <br />
      </div>
        </form>
      </div>
      <?php
      } 
      ?>
      </div>

      <?php
      $sql = "SELECT * FROM national";
      $result = mysqli_query($conn, $sql);
      $total = mysqli_num_rows($result);
      $pageItem = ceil($total/$pageNum);
      ?>

      <p id="page-number" class="hidden"><?php echo $page;?></p>
      <ul class='pagination justify-content-center m-5'>
          <?php
          for($i =1; $i <= $pageItem; $i++){
    
      echo "<li class ='page-item'> <a id='page' class='page$i page-link btn' href='index.php?page=".$i."'>".$i."</a></li>" ;
          }
        ?>
      </ul>
      <?php include("footer.php");?>
      
    </div>
    <script src="JS/jar.amd.min.js"></script>
    <script src="JS/search.js"></script>
    <script src="JS/cart.js"></script>
    <script src="JS/modals.js"></script>
    <script src="JS/smallDevice.js"></script>
    <script src="JS/sweetalert2.all.min.js"></script>
    <script src="JS/aos.js"></script> 
    <script>
      AOS.init();
    </script>
  </body>
</html>
