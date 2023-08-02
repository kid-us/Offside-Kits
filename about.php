<?php

session_start();

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

    <link rel="stylesheet" href="Css/animate.min.css" />
    <link rel="stylesheet" href="Css/style.css" />
    <link rel="stylesheet" href="Css/modal.css" />
    <!-- Animated scrollbar link -->
    <link rel="stylesheet" href="Css/aos.css">
    <link rel="website icon" href="Img/web-logo.png">


    <title>About</title>
</head>

<body>
    <?php include("modals.php") ?>
    <?php include("navbar.php") ?>
    <div class="container fw-semibold hero p-5 bg mb-5">
        <h4 class="mt-5 ">What is offsidekits.com?</h4>

        <p class="mb-5">Go on, get to know us a little better.</p>

        <p class="fs-5 mb-4 ">Offsidekits.com Is Here To Make Things Affordable For You, ON and Off the
            Pitch.
            It's As Simple As That.</p>

        <p>Since 2022, we'have been partnering with the world’s most trusted sportswear brands and retailers,
            helping
            people
            to compare thousands of prices in one handy place. Our sole purpose is to make it easy for you to save
            money
            on
            your favourite products.</p>

        <p>It's time to grab a brew, put your feet up, and shop all your favourite retailers with barely any effort.
            Offsidekit.com serves up the lowest prices on more than 100 products, which is why we're trusted by many
            people
            just like you, every day.</p>

        <h5 class="my-5">Why Choose Offsidekit.com?</h5>

        <div class="row justify-content-center shadow-lg p-5 mb-5">
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <h6 class="">Save Money</h6>
                <p>
                    Compare prices to easily bag the best deals out there. With no extra payment for delivery.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h6 class="">Find Awesome Stuff</h6>
                <p>
                    Explore a Huge selection of the largest football boots, kits like national and clubs kit.
                </p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <h6 class="">Make Life Easier</h6>
                <p>Browse 100s of products and compare prices from over 100 fantastic retailers. All in one Place.
                </p>
            </div>
        </div>

        <h5 class="my-5 ">How do we make money??</h5>
        <p>As we mentioned, it's our only job to gather the best deals for you. And we pride ourselves on doing that
            with
            100% impartiality.

            At Offsidekit.com, we use affiliate links to pop you over to the retailer, meaning we'll likely earn a
            bit
            of
            commission from them. Hey, we've got to make some money for doing the legwork, right? This doesn't mean
            it
            will
            cost you more. And it never will.

            From time to time, we’ll work closely with certain retailers to show their items as ‘Sponsored Deals’,
            this
            will
            be clearly labelled for you on product pages. Don’t worry though, we’ll still show the full choice of
            offers
            from
            other retailers and brands alongside it too.</p>

        <h5 class="my-5 ">Brands We Partner With</h5>

        <div class="row mt-5 p-5 justify-content-center shadow-lg">
            <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                <img src="img/nike.png" alt="nike logo" width="100px">
                <p>Nike</p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                <img src="img/adidas.png" alt="adidas logo" width="100px">
                <p>Adidas</p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                <img src="img/puma.png" alt="puma logo" width="100px">
                <p>Puma</p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                <img src="img/newbalance.png" alt="new balance logo" width="100px">
                <p>New Balance</p>

            </div>
        </div>

        <h5 class="my-5 ">Visit-us on our social Media</h5>

        <div class="row mt-4 p-5 justify-content-center shadow-lg text-center">
            <div class="col-3 mb-2">
                <a href="#">
                    <img src="img/ig.png" alt="instagram logo" width="30px">
                </a>
            </div>

            <div class="col-3 mb-2">
                <a href="#">
                    <img src="img/fb.png" alt="Facebook logo" width="30px">
                </a>
            </div>

            <div class="col-3 mb-2">
                <a href="#">
                    <img src="img/tiktok.png" alt="Tik-tok logo" width="30px">
                </a>
            </div>

            <div class="col-3 mb-2">
                <a href="#">
                    <img src="img/tg.png" alt="Telegram logo" width="30px">
                </a>

            </div>
        </div>

        <p class=" text-center text-success mt-5">We Thank You For Visiting Us :)</p>
    </div>

    <!-- Footer -->
    <?php include("footer.php") ?>

    <script src="JS/jar.amd.min.js"></script>
    <script src="JS/cart.js"></script>
    <script src="JS/modals.js"></script>
    <script src="JS/smallDevice.js"></script>
</body>
</head>
