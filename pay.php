<?php
if (isset($_POST['order'])) {
    $payment = $_POST['buying'];
}

$publishableKey = "pk_test_51KmARWC1vnRWUUD4VR8NF4E7d9eTwsAjEEBaGr4msJUOSSV9VGVNZ75FDpYFWL5uU7TYPSryWf3tX8McRErhh93600RpBA1oak";

$secretKey = "sk_test_51KmARWC1vnRWUUD4a2BAo6BosfnhTGsWUv75lJ9K0sjQamVwUkNNWbpXB7I08nsL7fePfpM2BhKD2LgxcVejKG9p008DeD4eza";

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
    <link rel="stylesheet" href="Css/style.css" />
    <link rel="stylesheet" href="Css/modal.css" />

    <!-- country phone and flag links -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>

    <link rel="website icon" href="Img/web-logo.png">
    <title>Pay</title>
</head>

<body>

    <div class="container fw-semibold mt-5">
        <p>
            <a href="index.php">
                <img src="Img/logo.png" alt="Our shop logo" width="150px">
            </a>
        </p>

        <?php
        if ($payment === 'single') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_POST['img'];
            $qty = $_POST['qty'];
            $size = $_POST['size'];
            ?>

            <div class="row p-lg-5 my-5">
                <div class="col-lg-5 col-md-5 col-12 mt-3">
                    <div class="row bg-dark py-5 text-light rounded mt-5">
                        <div class="col-lg-7 col-md-7 col-12">
                            <img id="img" src="<?php echo $image; ?>" alt="<?php echo $name ?>" width="300px" />
                        </div>
                        <div class="col-lg-4 col-md-5 col-12 mt-lg-5 pt-lg-5 text-center">
                            <p>
                                <?php echo $name; ?>
                            </p>
                            <p>
                                <?php echo "Quantity " . $qty; ?>
                            </p>
                            <p>
                                <?php echo "Size " . $size; ?>
                            </p>
                            <p>
                                <?php echo $price . "$ each"; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-12 ms-lg-5 mt-3 p-5 shadow-lg bg rounded">
                    <form action="single.php" id="form" method="POST" class="mb-4 text-dark small"
                        data-stripe-publishable-key="<?php echo $publishableKey ?>">
                        <p class="fs-4">Pay with Card</p>
                        <label for="name">Name</label>
                        <input id="name-input" type="text" name="name" class="form-control my-3" required />

                        <label for="phone">Phone</label>
                        <input id="phone-flag" type="tel" name="phone" class="form-control my-3" required
                            style="z-index: 0;" />

                        <label for="city">City</label>
                        <input id="city-input" type="text" name="city" class="form-control my-3" required />

                        <label for="address">Address</label>
                        <input id="address-input" type="text" name="address" class="form-control my-3" required />

                        <label for="email">Email</label>
                        <input id="email-input" type="email" name="email-address" class="form-control my-3" />

                        <label for="email">Card Information</label>
                        <input type="tel" readonly id="card-number" name="card-number"
                            class=" form-control mt-1 bi bi-cart " value="4242 4242 4242 4242">

                        <div class="input-group mb-4">
                            <input type="tel" name="expire-month" id="exp_mon" size="2" class="form-control mt-0" value="12"
                                readonly>

                            <input type="tel" name="expire-year" size="4" id="exp_year" class="form-control" value="2028"
                                size="3" readonly>
                            <input type="number" name="card-code" id="cvc" class="form-control" value="123" readonly>
                        </div>

                        <input type="text" name="Item-name" class="form-control" value="<?php echo $name; ?>" hidden />
                        <input type="text" name="Item-price" class="form-control" value="<?php echo $price; ?>" hidden />
                        <input type="text" name="Item-size" class="form-control" value="<?php echo $size; ?>" hidden />
                        <input type="text" name="Item-quantity" class="form-control" value="<?php echo $qty; ?>" hidden />
                        <input type="text" name="Item-image" class="form-control" value="<?php echo $image; ?>" hidden />
                        <input type="text" name="tot-price" class="form-control" value="<?php echo $qty * $price; ?>"
                            hidden />
                        <input type="text" id="stripeToken" name="stripeToken" hidden>

                        <button type="submit" id="buy-btn" class="buy-btn w-100 mt-4 py-2"> Pay
                            <?php echo $price * $qty . "$"; ?>
                        </button>

                    </form>
                </div>

            </div>


            <?php
        } else if ($payment === 'multiple') {
            $name = $_POST['Item-name'];
            $price = $_POST['Item-price'];
            $image = $_POST['Item-image'];
            $qty = $_POST['Item-quant'];
            $size = $_POST['Item-size'];
            $len = $_POST['Item-length'];
            ?>
                <div class="row py-5 px-2 my-5">
                    <h5 class="pb-3">Total
                    <?php echo $len ?>
                        Product
                    </h5>
                    <div class="col-lg-5 col-md-5 col-12 mb-5 bg-dark text-light rounded multiple-product-container">
                        <?php
                        $totalSum = 0;
                        for ($i = 0; $i < $len; $i++) {
                            $totalSum = $totalSum + $qty[$i] * $price[$i];
                            ?>
                            <div class="row">
                                <div class="col-6 mt-4">
                                    <img id="img" src="<?php echo $image[$i]; ?>" alt="<?php echo $name[$i] ?>" width="200px" />
                                </div>
                                <div class="col-6 mt-4 pt-lg-3 text-center">
                                    <p>
                                    <?php echo $name[$i]; ?>
                                    </p>
                                    <p>
                                    <?php echo "Quantity " . $qty[$i]; ?>
                                    </p>
                                    <p>
                                    <?php echo "Size " . $size[$i]; ?>
                                    </p>
                                    <p>
                                    <?php echo $price[$i] . "$ each"; ?>
                                    </p>
                                </div>
                            </div>
                            <hr class="my-4 bg-light">
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 ms-lg-5 p-5 shadow-lg bg rounded">
                        <form action="multiple.php" id="form" method="POST" class="mb-4 text-dark small"
                            data-stripe-publishable-key="<?php echo $publishableKey ?>">
                            <p class="fs-4 mb-5">Pay with Card</p>
                            <label for="name">Name</label>
                            <input id="name-input" type="text" name="name" class="form-control my-3" required />

                            <label for="phone">Phone</label>
                            <input id="phone-flag" type="tel" name="phone" class="form-control my-3" required
                                style="z-index: 0;" />

                            <label for="city">City</label>
                            <input id="city-input" type="text" name="city" class="form-control my-3" required />

                            <label for="address">Address</label>
                            <input id="address-input" type="text" name="address" class="form-control my-3" required />

                            <label for="email">Email</label>
                            <input id="email-input" type="email" name="email-address" class="form-control my-3" />

                            <label for="email">Card Information</label>
                            <input type="tel" readonly id="card-number" name="card-number"
                                class=" form-control mt-1 bi bi-cart " value="4242 4242 4242 4242">

                            <div class="input-group mb-4">
                                <input type="tel" name="expire-month" id="exp_mon" size="2" class="form-control mt-0" value="12"
                                    readonly>

                                <input type="tel" name="expire-year" size="4" id="exp_year" class="form-control" value="2028"
                                    size="3" readonly>
                                <input type="number" name="card-code" id="cvc" class="form-control" value="123" readonly>
                            </div>

                            <?php
                            for ($i = 0; $i < $len; $i++) {
                                ?>
                                <input type="text" name="Item-name[]" class="form-control" value="<?php echo $name[$i]; ?>"
                                    hidden />
                                <input type="text" name="Item-size[]" class="form-control" value="<?php echo $size[$i] ?>" hidden />
                                <input type="text" name="Item-price[]" class="form-control" value="<?php echo $price[$i]; ?>"
                                    hidden />
                                <input type="text" name="Item-quantity[]" class="form-control" value="<?php echo $qty[$i]; ?>"
                                    hidden />
                                <input type="text" name="Item-image[]" class="form-control" value="<?php echo $image[$i]; ?>"
                                    hidden />
                                <?php
                            }
                            ?>

                            <input type="text" name="length" class="form-control" value="<?php echo $len; ?>" hidden />
                            <input type="text" id="stripeToken" name="stripeToken" hidden>

                            <input type="text" name="tot-price" class="form-control" value="<?php echo $totalSum; ?>" hidden />

                            <button type="submit" id="buy-btn" class="buy-btn w-100 mt-4 py-2"> Pay
                            <?php echo $totalSum . "$"; ?>
                            </button>

                        </form>
                    </div>
                </div>
                <?php
        }
        ?>

    </div>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $('#form').on('submit', (e) => {
            const form = $('#form');
            e.preventDefault();

            const cardNumber = $('#card-number').val();
            const cvc = $('#cvc').val();
            const expiryMonth = $('#exp_mon').val();
            const expiryYear = $('#exp_year').val();

            if (!form.data('cc-on-file')) {
                Stripe.setPublishableKey(form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: cardNumber,
                    cvc: cvc,
                    exp_month: expiryMonth,
                    exp_year: expiryYear
                }, (status, response) => {

                    if (response.error) return alert('Errors');

                    let token = response['id'];

                    $('#stripeToken').attr('value', token);

                    document.getElementById('form').submit();
                });
            }
        });
    </script>
</body>

</html>
