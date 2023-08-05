<nav>
    <!-- Large Device Navbar -->
    <div class="fixed-top bg">
        <div class="container d-none d-md-block fw-semibold pb-5 pt-4 small">
            <div class="float-start">
                <a href="index.php">
                    <span class="mr-3">
                        <img src="Img/logo.png" alt="Our shop logo" width="150px">
                    </span>
                </a>
            </div>
            <div class="float-end mt-2">

                <a id="product-link" class="cursor text-decoration" title="Cart">
                    Products
                    <span class="bi bi-caret-down-fill"></span>
                </a>

                <?php
                if (isset($_SESSION['username'])) {
                    if (time() - $_SESSION['login_time'] > 7200) {
                        header("Location: Php/logout.php");
                    }
                    echo '<a id="user-log-reg-profile" class="cursor mx-5 text-decoration">' . $_SESSION['username'] . '<span class="bi bi-person-fill ms-2"></span></a>';
                    // unset($_SESSION['username']);
                } else {
                    echo '
                        <a id="user-log-reg-profile" class="cursor text-decoration mx-5">Accounts <span id="arrow">⇣</span></a>
                        ';
                }
                // unset($_SESSION['message']);
                ?>

                <a id="cart-link" class="cursor text-decoration position-relative" title="cart">
                    <img src="Img/side cart.png" alt="" width="28px" />
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        id="badge-counter">
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <!-- Small Device Navbar -->
    <div class="bg fixed-top">
        <div class="d-block d-md-none">
            <ul class="mt-4 mb-5">
                <li class="Navs">
                    <a href="index.php">
                        <img src="Img/logo.png" alt="" width="120px">
                    </a>
                </li>
                <li class="Navs right">
                    <a id="click-me" class="bi bi-list text-dark fs-2 pe-4"></a>
                </li>

                <li class="Navs right">

                </li>
            </ul>
        </div>
    </div>
</nav>


<div id="cart-link" class="d-block d-md-none Navs fixed-bottom pb-5 rounded ms-3">
    <a id="sm-cart-link" class="cursor text-decoration position-relative" title="cart">
        <img src="Img/side cart.png" alt="" width="28px" />
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="badged">
            <span class="visually-hidden">unread messages</span>
        </span>
    </a>

    <!--  -->
</div>
