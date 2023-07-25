<!-- Account Modal -->
<div id="account-modal" class="accounts-modal p-4 rounded bg-light small hidden fw-semibold border border-dark">
  <p><a class="text-decoration" href="login.php">Login</a></p>
  <p><a class="text-decoration" href="register.php">Register</a></p>
</div>

<!-- Dashboard Modal -->
<div id="dashboard" class="dashboard-modal p-4 rounded bg-light small hidden fw-semibold border border-dark">
  <p><a href="profile.php" class="text-decoration dash-link">Profile</a></p>
  <p><a href="status.php" class="text-decoration dash-link">Status</a></p>
  <p><a href="Php/logout.php" id="account-sign-out" class="text-decoration dash-link small text-danger">Sign Out</a>
  </p>
</div>

<!-- Small Device Modal -->
<div id="menu-page" class="bg-light shadow rounded hidden animate__animated animate__fadeInDown">
  <div class="fw-semibold ms-5 fs-5">
    <?php
    if (isset($_SESSION['username'])) {
      if (time() - $_SESSION['login_time'] > 7200) {
        header("Location: Php/logout.php");
      }
      echo '<p class="text-danger fs-3 text-end me-5">' . strtoupper($_SESSION['username']) . '<span class="ms-4 bi bi-person-fill ml-1"></span></p>';

      echo '<p class="pt-3"><a class="text-decoration" href="status.php"  >Status</a></p>';

      echo '<p class="pt-3"><a class="text-decoration" href="profile.php"  >Profile</a></p>';

      echo '<p class="pt-3"><a class="text-decoration" href="Php/logout.php"  >Sign out</a></p>';

      // unset($_SESSION['username']);
    } else {
      // echo '<p class="text-danger fs-3 text-end me-5">' . strtoupper("kidus") . '<span class="ms-4 bi bi-person-fill ml-1"></span></p>';
    
      // echo '<p class="pt-3"><a class="text-decoration" href="status.php"  >Status</a></p>';
    
      // echo '<p class="pt-3"><a class="text-decoration" href="profile.php"  >Profile</a></p>';
    
      // echo '<p class="pt-3"><a class="text-decoration" href="Php/logout.php"  >Sign out</a></p>';
      echo '
            <p class="text-danger small">Account</p>';
      echo '
            <p class=""><a class="text-decoration" href="login.php">Login</a></p>';

      echo '<p class="pt-3"><a class="text-decoration" href="register.php" >Register</a></p>';
    }
    ?>

    <p class="text-danger small mt-5">Product</p>

    <p class="">
      <a class="text-decoration" href="index.php" class="text-danger" id="national-menu">National
        <span>
          <img src="Img/national.png" alt="" width="20px">
        </span>
      </a>
    </p>
    <p class="pt-3" id="club-menu">
      <a class="text-decoration" href="clubs.php">Club Teams
        <span>
          <img src="Img/club.png" alt="" width="20px">
        </span>
      </a>
    </p>
    <p class="pt-3 " id="boots-menu">
      <a class="text-decoration" href="boots.php">Boots
        <span>
          <img src="Img/boot.png" alt="" width="20px">
        </span>
      </a>
    </p>
  </div>
</div>

<!-- Product Modals -->
<div id="product-modal" class="product-modal p-4 rounded bg-light small hidden fw-semibold border border-dark">
  <p><a href="index.php" class="text-decoration">National Kits</a></p>
  <p><a href="clubs.php" class="text-decoration">Clubs Kits</a></p>
  <p><a href="boots.php" class="text-decoration">Boots</a></p>
</div>


<div id="overlay" class="hidden"></div>
<button id="close" class="close mr-4 p-2 float-right hidden">&times;</button>
<!-- contact Us -->
<div id="contact-modal" class="shadow-lg mb-5 hidden">
  <button id="quit-contact" class="close mt-1 mr-4">&times;</button>
  <div class="row justify-content-center rounded">
    <div class="col-lg-6 col-md-6 col-sm-6 p-5 pr-0  bg-danger" : #E0E0E0;>
      <p class="lead text-center font-weight-bold text-light">Contact Us</p>
      <p class="font-weight-bold"><span>$</span>Address</p>
      <p class="pl-3 text-light">Lorem ipsum dolor sit.</p>
      <p class="font-weight-bold"><span>$</span>Phone</p>
      <p class="pl-3 text-light">+25100000000</p>
      <p class="font-weight-bold"><span>$</span>Email</p>
      <a href="#" class="pl-3 text-light">Offsidekit@gmail.com.et</a>
      <p class="font-weight-bold mt-3"><span>$</span>Website</p>
      <p class="pl-3 text-light">Offsidekit.com.et</p>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 p-5 pl-0">
      <form method="POST" id="contact-form">
        <p class="font-weight-bold text-center">Get in touch</p>
        <input type="text" name="name" id="contact-name" class="form-control rounded-lg mb-5 bg-info text-light"
          placeholder="name">

        <input type="email" id="contact-email" class="form-control rounded mb-5 bg-info text-light" placeholder="email">


        <textarea name="comment" id="contact-comment" class="form-control rounded mb-5 bg-info text-light" cols="2"
          rows="4" placeholder="Message"></textarea>
        <button id="contact-btn" type="submit" disabled class="btn btn-warning rounded-pill w-50 mb-4">Send --></button>
      </form>
    </div>
  </div>
</div>


<!-- About Us Page -->
<div id="about-us-modal" class="shadow-lg hidden" style="background-color: #E0E0E0;">
  <button id="about-close" class="close mr-4 mt-3">&times;</button>

  <div class="p-5">
    <div class="text-center">
      <img src="Img/logo.png" alt="Our shop logo" width="150px">
    </div>

    <h4 class="text-center mt-5 font-weight-bold">What is offsidekits.com??</h4>

    <p class="text-center text-danger mb-5">Go on, get to know us a little better.</p>

    <h4 class="mb-4 font-weight-bold">Offsidekits.com Is Here To Make Things Affordable For You, ON and Off the Pitch.
      It's As Simple As That.</h4>

    <p>Since 2022, we'have been partnering with the world’s most trusted sportswear brands and retailers, helping people
      to compare thousands of prices in one handy place. Our sole purpose is to make it easy for you to save money on
      your favourite products.</p>

    <p>It's time to grab a brew, put your feet up, and shop all your favourite retailers with barely any effort.
      Offsidekit.com serves up the lowest prices on more than 100 products, which is why we're trusted by many people
      just like you, every day.</p>

    <h4 class="m-5 text-center font-weight-bold">Why Choose Offsidekit.com?</h4>

    <div class="row justify-content-center shadow-lg p-5 mb-5">
      <div class="col-lg-4 col-md-4 col-sm-12 ">
        <h4 class="font-weight-bold">Save Money</h4>
        <p>
          Compare prices to easily bag the best deals out there. With no extra payment for delivery.
        </p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <h4 class="font-weight-bold">Find Awesome Stuff</h4>
        <p>
          Explore a Huge selection of the largest football boots, kits like national and clubs kit.
        </p>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        <h4 class="font-weight-bold">Make Life Easier</h4>
        <p>Browse 100s of products and compare prices from over 100 fantastic retailers. All in one Place.</p>
      </div>
    </div>

    <h2 class="text-center m-3 font-weight-bold">How do we make money??</h2>
    <p>As we mentioned, it's our only job to gather the best deals for you. And we pride ourselves on doing that with
      100% impartiality.

      At Offsidekit.com, we use affiliate links to pop you over to the retailer, meaning we'll likely earn a bit of
      commission from them. Hey, we've got to make some money for doing the legwork, right? This doesn't mean it will
      cost you more. And it never will.

      From time to time, we’ll work closely with certain retailers to show their items as ‘Sponsored Deals’, this will
      be clearly labelled for you on product pages. Don’t worry though, we’ll still show the full choice of offers from
      other retailers and brands alongside it too.</p>

    <h2 class="text-center m-3 font-weight-bold">Brands We Partner With</h2>

    <div class="row mt-5 p-5 justify-content-center shadow-lg">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <img src="img/nike.png" alt="nike logo" width="100px">
        <p class="font-weight-bold">Nike</p>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <img src="img/adidas.png" alt="adidas logo" width="100px">
        <p class="font-weight-bold">Adidas</p>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <img src="img/puma.png" alt="puma logo" width="100px">
        <p class="font-weight-bold">Puma</p>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <img src="img/newbalance.png" alt="new balance logo" width="100px">
        <p class="font-weight-bold">New Balance</p>

      </div>
    </div>

    <h4 class="mt-5 font-weight-bold">Visit-us on our social medias</h4>

    <div class="row mt-4 p-5 justify-content-center shadow-lg">
      <div class="col-lg-3 col-md-3 col-sm-3">
        <a href="#">
          <img src="img/ig.png" alt="instagram logo" width="30px">
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-3">
        <a href="#">
          <img src="img/fb.png" alt="Facebook logo" width="30px">
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-3">
        <a href="#">
          <img src="img/tiktok.png" alt="Tik-tok logo" width="30px">
        </a>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-3">
        <a href="#">
          <img src="img/tg.png" alt="Telegram logo" width="30px">
        </a>

      </div>
    </div>

    <p class="font-weight-bold text-center text-success mt-5">We Thank You For Visiting Us :)</p>
  </div>
</div>
