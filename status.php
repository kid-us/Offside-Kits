<?php

session_start();

include("Php/conn.php");
include ("Php/conn.php");

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM store WHERE customerEmail = '$email' AND payed = '1'"; 
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Img/status-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="Css/style.css" / >
    <link rel="stylesheet" href="Css/modal.css" /><link rel="stylesheet" href="Css/modal.css" />
    <!-- scrollbar animation -->
    <link rel="stylesheet" href="Css/aos.css">
    <!-- font link -->
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
            '<li class="Navs right mr-3"><a href="/Php/logout.php" id="dash-sign-out" class="text-danger">Sign out</a></li>';
            
            echo
            '<li class="Navs right mr-3"><a href="profile.php">Profile</a></li>';
            // unset($_SESSION['username']);
            }
    ?>
    </ul>

   <hr style="background: 1px solid #000;">      

            <div style="background-color: #F5F5F5;" class="shadow-lg rounded" >

            <p class="p-4 text-center">Dear our customer <span class="text-danger"> <?php echo $_SESSION['username'];?> </span> this page shows items you purchased from us. <span class="text-success">
            We thnak you for chossing us!</span>
            </p>
            <!-- <div class="mb-5 mt-4"> -->     
                <h4 class="ml-4 pt-2 font-weight-bold">Status</h4>
                <hr style="background: 1px solid #000;">      

            <?php
            if($count >= 1){
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $productName =  $row['productName'];
                        $productPrice =  $row['productPrice'];
                        $size =  $row['size'];
                        $date = $row['date'];
                        $image = $row['image']; 
            ?>
            
                        <div id="purchased-view" class="row pt-3 justify-content-center" data-aos="fade-up" data-aos-duration="2000">
                            <div class="col-2">
                                Purchased Item
                            </div>
                            <div class="col-4">
                                <label for="item-name" class="text-danger">Item Name</label>
                                <p class="ml-4"> <?php echo $productName?> </p>
                                <label class="text-danger" for="price">Price</label>
                                <p class="ml-4"> <?php echo $productPrice?> </p>
                                <label class="text-danger" for="size">Size</label>
                                <p class="ml-4"> <?php echo $size?> </p>
                                <label class="text-danger" for="Purchased Date">Purchased Date</label>
                                <p class="ml-4"> <?php echo $date?> </p>
                            </div>
                            <div class="col-5">
                                <img src="<?php echo $image;?>" alt="Purchased Item Image" width="60%">
                            </div>
                        </div>
                        <hr style="background: 1px solid #000;">
                <?php
                    }
            }else{
                echo '
                    <p class="p-5 text-center text-danger font-weight-bold"> Items not Purchased Yet! Please Buy our products </p>
                    ';
            }
            ?>
        </div>
        <?php include("footer.php")?>
    </div>
    <script src="JS/jar.amd.min.js"></script>
    <script src="JS/modals.js"></script>
    <script src="JS/aos.js"></script> 
    <script>
      AOS.init();
    </script>
    <script>
        const date = new Date();
        let d = date.getFullYear();
        document.getElementById("date").innerHTML = d;
    </script>
</body>
</html>
