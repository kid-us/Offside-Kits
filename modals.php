<!-- Cart -->

<div id="cart-page" class="cart-page animate__animated animate__fadeInRight hidden border border-dark fw-semibold bg2">
  <div class="">
    <p class="my-cart-title px-4 py-4">My cart
      <span id="close-cart" class="cursor float-end bi bi-x text-light bg-danger rounded px-1"></span>
    </p>
  </div>

  <form action="pay.php" method="POST">
    <div id="cart-section" class="multiple-item px-3 text-dark mb-2 bg">
    </div>
    <input type="text" name="buying" value="multiple" hidden>
    <input type="number" name="totalPrice" hidden readonly id="total-input-price">
    <input type="text" name="Item-length" hidden readonly id="item-length">

    <section id="cart-checkout-btn" class="px-3 py-4">
      <p class="">Total Price: &nbsp; <span id="total-price"></span></p>
      <div class="row justify-content-center fw-semibold">
        <div class="col-3">
          <a id="clear-cart" class="small btn btn-danger"><i class="bi bi-trash"></i></a>
        </div>
        <div class="col-9">
          <button name="order" id="checkout-btn" class="buy-btn py-2 w-100 small">
            Checkout</button>
        </div>
      </div>
    </section>
  </form>
</div>

<!-- Account Modal -->
<div id="account-modal" class="accounts-modal p-4 rounded bg small hidden fw-semibold border border-dark">
  <p><a class="text-decoration dash-link" href="login.php">Login</a></p>
  <p><a class="text-decoration dash-link" href="register.php">Register</a></p>
</div>

<!-- Dashboard Modal -->
<div id="dashboard" class="dashboard-modal p-4 rounded bg small hidden fw-semibold border border-dark">
  <p><a href="profile.php" class="text-decoration dash-link">Profile</a></p>
  <p><a href="status.php" class="text-decoration dash-link">Status</a></p>
  <p><a href="Php/logout.php" id="account-sign-out" class="text-decoration dash-link small text-danger">Sign Out</a>
  </p>
</div>

<!-- Small Device Modal -->
<div id="menu-page" class="bg shadow rounded hidden animate__animated animate__fadeInDown">
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

    } else {
      echo '
            <p class="text-danger small">Account</p>';
      echo '
            <p class=""><a class="text-decoration" href="login.php">Login</a></p>';

      echo '<p class="pt-3"><a class="text-decoration" href="register.php" >Register</a></p>';
    }
    ?>

    <p class="text-danger small mt-5">Product</p>

    <p class="">
      <a class="text-decoration" href="national.php" class="text-danger" id="national-menu">National
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
<div id="product-modal" class="product-modal p-4 rounded bg small hidden fw-semibold border border-dark">
  <p><a href="national.php" class="text-decoration dash-link">National Kits</a></p>
  <p><a href="clubs.php" class="text-decoration dash-link">Clubs Kits</a></p>
  <p><a href="boots.php" class="text-decoration dash-link">Boots</a></p>
</div>


<div id="overlay" class="hidden"></div>
<button id="close" class="close mr-4 p-2 float-right hidden">&times;</button>
