<?php

require("config.php");

$name = "";
$price = "";
$image = "";

if(isset($_POST['shop-btn'])){
  $name = htmlentities($_POST['item-name']); 
  $price = htmlentities($_POST['item-price']);
  $description = htmlentities("National Team");
  $image = htmlentities($_POST['image']);
  $amount = htmlentities(intval($price)*100); 
  $item = htmlentities("Kit");
}

if(isset($_POST['club-shop-btn'])){
  $name = htmlentities($_POST['club-item-name']);
  $description = htmlentities("Football Club");
  $price = htmlentities($_POST['club-item-price']);
  $image = htmlentities($_POST['club-image']);
  $amount = htmlentities(intval($price)*100);
  $item = htmlentities("Kit");
}

if(isset($_POST['boot-shop-btn'])){
  $name =htmlentities( $_POST['boot-name']);
  $description = htmlentities("Football Players");
  $price = htmlentities($_POST['boot-price']);
  $image = htmlentities($_POST['boot-image']);
  $amount = htmlentities(intval($price)*100);
  $item = htmlentities("Boot");

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <title>Buying.....</title>
  </head>
  
  <style>
    .form-control::placeholder{
      color: #fff;
    }
    .form-control{
      color: #fff;
    }
  </style>

  <body>
    <div class="container font-weight-light">
      <ul class="m-4">
        <li class="Navs list">
          <a href="index.php">
            <span class="mr-3"
              ><img src="/Img/logo.png" alt="Our shop logo" width="150px" /></span
            ></a
          >
        </li>
      </ul>


      <!-- <div class="row justify-content-center shadow-lg rounded bg-light"> -->
      <?php include("modals.php")?>


        <div id="payment-modal" class="shadow-lg rounded p-2">
          <form action="submit.php" method="POST" class="mb-4">
            <div class="row justify-content-center p-5 ">
              <div class="col-sm-12 col-md-6 col-lg-5 mb-5 ">
                <img src="img/pen.png" alt="" width="45" class="mb-4" /> <span class="font-weight-bold ml-4">Tell us ur Information</span> 

                
                <select name="size" id="kit-size" class="form-control m-2 bg-info hidden text-light font-weight-bold w-50">
                  <option value="Size" disabled selected hidden>Size</option>
                  <option class="text-light">Large (X)</option>
                  <option class="text-light">Medium (M)</option>
                  <option class="text-light">Small (SM)</option>
                </select>

                <select type="number" name="size" id="boot-size" class="form-control m-2 bg-info w-25 hidden text-light font-weight-bold">
                    <option disabled selected hidden>Size</option>
                    <option class="text-light">38</option>
                    <option class="text-light">39</option>
                    <option class="text-light">40</option>
                    <option class="text-light">41</option>
                    <option class="text-light">42</option>
                </select>

                <div class="form-inline m-2">
                  <label for="Quantity" class="small font-weight-bold mr-2">Quantity</label>
                  <select class="w-25 form-control bg-info text-light font-weight-bold" name="quantity" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                </div>


                <input
                  id="phone-flag"
                  type="tel"
                  name="phone"
                  class="form-control bg-info m-2 text-light font-weight-bold w-100"
                  placeholder="phone"
                  required
                  style="z-index: 0;"

                />
                
                <input
                  id="name-input"
                  type="text"
                  name="name"
                  class="form-control bg-info m-2 text-light font-weight-bold"
                  placeholder="name"
                  required
                />  
            
                <input
                  id="address-input"
                  type="text"
                  name="address"
                  class="form-control bg-info m-2 text-light font-weight-bold"
                  placeholder="address"
                  required
                  />

                  <input
                  id="email-input"
                    type="email"
                    name="email-address"
                    class="form-control bg-info m-2 text-dark font-weight-bold"
                    placeholder="email"
                  />
          
                <input
                  type="text"
                  name="item-name"
                  class="form-control bg-info m-2"
                  value="<?php echo $name;?>"
                  hidden
                />
                <input
                  type="text"
                  name="price"
                  class="form-control-plaintext mt-2"
                  value="<?php echo $price;?>"
                  hidden
                />
                
                <input
                  type="text"
                  name="image"
                  class="form-control-plaintext mt-2"
                  value="<?php echo $image;?>"
                  hidden
                  onmo
                />

              </div>

                <div id="main-box" class="col-sm-12 col-md-6 col-lg-5 col-lg-4 pt-5 pl-5 pb-4 bg-dark rounded">
                  <img
                    id="img"
                    src="<?php echo $image;?>"
                    alt="Item name"
                    width="170px"
                  />
                  <p class=" mt-3 text-warning font-weight-bold"> <?php echo $name." " .$description;?> <span id="name"><?php echo $item;?></span> </p>
  
                  <p class="small text-danger font-weight-bold alert alert-danger p-2 rounded hidden" id="info-p">Input Fields are must be filled and please fill them correctly.
                  </p>
                  <span class=" mt-3 mr-5 bg-secondary pl-3 p-1 w-25 rounded text-light">
                    <?php echo $price;?>
                  </span>
                  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="<?php echo $publishableKey ?>"
                    data-amount="<?php echo $amount?>"
                    data-name="<?php echo $name?>"
                    data-description="<?php echo $description?>"
                  
                    data-currency="usd"
                    data-locale="auto"
                  >
                  </script>
                </div>
              </div>
            </form>
          </div>
            <?php include("footer.php")?>
          </div>

        <script src="JS/modals.js"></script>
        <script src="Js/size.js"></script>
  </body>
</html>
