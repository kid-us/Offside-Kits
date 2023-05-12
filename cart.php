<?php
require("config.php");

$publishableKey=   
"pk_test_51KmARWC1vnRWUUD4VR8NF4E7d9eTwsAjEEBaGr4msJUOSSV9VGVNZ75FDpYFWL5uU7TYPSryWf3tX8McRErhh93600RpBA1oak";

$secretKey = "sk_test_51KmARWC1vnRWUUD4a2BAo6BosfnhTGsWUv75lJ9K0sjQamVwUkNNWbpXB7I08nsL7fePfpM2BhKD2LgxcVejKG9p008DeD4eza";

// \Stripe\Stripe::setApiKey($secretKey);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Img/pay-ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="Css/repeat.css" / >
    <link rel="stylesheet" href="Css/modal.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Grape+Nuts&display=swap"
      rel="stylesheet"
    />
    <!-- country phone and flag links -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css"
    />
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>
    <style>
        .centered{
            margin-right: auto;
            margin-left: auto;
        }
    </style>
    <title>Buying.....</title>
</head>
<body>

  <?php include ("modals.php")?>

    <div class="container">
    <ul class="m-4">
        <li class="Navs list">
          <a href="index.php">
            <span class="mr-3"
              ><img src="/Img/logo.png" alt="Our shop logo" width="150px" /></span
            ></a
          >
        </li>
      </ul>
            <form action="multiCart.php"  method="POST">
              <div id="empty" class="empty-cart text-center alert alert-danger">
                <img src="/Img/empty-cart.png" class="img-responsive" alt="Empty cart" width="100%">
              </div>

              <div id="added-cart" class="hidden">

                <input type="text" id="key" hidden value = "<?php echo $publishableKey?>">

                  <div class="row justify-content-center rounded shadow-lg ">
                      <div class="col-lg-6 col-md-6 col-sm-12 p-5 pr-0">
        
                        <img src="img/pen.png" alt="" width="45" class="mb-4" /> <span class="ml-4 font-weight-bold">Tell us ur Information</span> <br>

                        <label for="phone" class="font-weight-bold">Phone:</label> <br>
                        
                        <input
                          id="phone-flag"
                          type="text"
                          name="phone"
                          class="form-control bg-info m-2 text-light font-weight-bold"
                          required
                        /> <br>

                        <label for="name" class="font-weight-bold mt-3">Name:</label>
                          <input
                          id="name-input"
                            type="text"
                            name="name"
                            class="form-control bg-info m-2 text-light font-weight-bold"
                            required
                          />
                          <label for="address" class="font-weight-bold">Address:</label>
                      
                          <input
                          id="address-input"
                            type="text"
                            name="address"
                            class="form-control bg-info m-2 text-light font-weight-bold"
                            required
                            />

                            <label for="email" class="font-weight-bold">Email:</label>
          
                            <input
                            id="email-input"
                              type="email"
                              name="email-address"
                              class="form-control bg-info m-2 text-light font-weight-bold"
                              
                            />
                      </div>
                      <div id="main-box" class="col-lg-6 col-md-6 col-sm-12 p-5 pl-0 mt-5 bg-secondary rounded">

                        <div class="multiple-cart-item ">
                            <p class="font-weight-bold mb-4">Item Name &nbsp; &nbsp;  Price &nbsp;  &nbsp; Quantity</p>
                        </div>
                       
                        <p class="text-danger font-weight-bold alert alert-danger p-2 rounded hidden" id="info-p">Input Fields are must be filled and please fill them correctly. also Don't forget to fill Size
                        </p>
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                          data-key = "<?php echo $publishableKey;?>"
                          data-name =  " Offside Multiple Cart"
                          data-description = "Multiple Market"
                          data-currency="usd"
                          data-locale="auto"
                        >
                        </script>
  
                  </div>
                        

                    </div>
                  </div>
                </form>
                <?php include("footer.php")?>
              </div>
            
              <script src="JS/jar.amd.min.js"></script>
              <script src="JS/modals.js"></script>
              <script src="JS/multiple.js"></script>
              <script src="JS/multiple-validation.js"></script>
</body>
</html>