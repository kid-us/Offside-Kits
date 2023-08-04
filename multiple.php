<?php

session_start();
require_once('vendor/autoload.php');
include("Php/conn.php");
require("config.php");

if (isset($_POST["stripeToken"])) {

    $token = $_POST["stripeToken"];
    $totalPrice = mysqli_real_escape_string($conn, $_POST['tot-price']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $buyerName = mysqli_real_escape_string($conn, $_POST['name']);
    $customerEmail = mysqli_real_escape_string($conn, $_POST["email-address"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $date = date("d/m/Y");
    $totalPrice = $_POST['tot-price'];

    $id = $buyerName . "" . $phone . "" . rand(1, 5000);

    $length = $_POST["length"];
    $itemName = $_POST['Item-name'];
    $itemSize = $_POST['Item-size'];
    $itemPrice = $_POST['Item-price'];
    $itemQuant = $_POST['Item-quantity'];
    $itemImage = $_POST['Item-image'];

    for ($i = 0; $i < $length; $i++) {
        echo $itemName[$i];
        $sql = "INSERT INTO store (customerName, customerPhone, customerEmail, city , customerAddress, productName, productPrice, orderedId, payed, date, size, image, quantity, totalPayed) VALUES ('$buyerName','$phone','$customerEmail', '$city','$address','$itemName[$i]','$itemPrice[$i]', '$id', '0','$date', '$itemSize[$i]', '$itemImage[$i]', $itemQuant[$i], $itemPrice[$i]*$itemQuant[$i])";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Not Inserted";
        }
    }

    Stripe\Stripe::setApiKey('secret key here');
    $data = Stripe\Charge::create([
        "amount" => $totalPrice * 100,
        "currency" => "usd",
        "source" => $token,
        "description" => $id,
    ]);
    // }
    if ($data) {
        $orderId = $data->description;
        for ($i = 0; $i < $length; $i++) {
            $sqlI = "UPDATE store SET payed = '1' WHERE orderedId = '$orderId'";
            $res = mysqli_query($conn, $sqlI);
        }

        if ($res) {
            //     $msg = "Offside Kits. Dear customer $buyerName thank you for choosing us! Your purchased items will delivered within one week at $address ethiopia. Visit us again!";
            //     require_once('vendor/autoload.php');
            //     // require_once 'HTTP/Request2.php';
            //     $request = new HTTP_Request2();
            //     $request->setUrl('https://api.telda.com.et/api/write/SendMessage');
            //     $request->setMethod(HTTP_Request2::METHOD_POST);
            //     $request->setConfig(
            //         array(
            //             'follow_redirects' => TRUE
            //         )
            //     );
            //     $request->setHeader(
            //         array(
            //             'accept' => 'text/plain',
            //             'Content-Type' => 'application/json',
            //             'Authorization' => 'Basic Rcyi4/FN2kjlIHfV1gm3RIYcAEYM5mESMTAwMDkzNjIzMTIyNQ=='
            //         )
            //     );

            //     $request->setBody('{"phone":"' . $phone . '","message":"' . $msg . '"}');

            //     // $request->setBody("{'$phone','$msg'}");
            //     try {
            //         $response = $request->send();
            //         if ($response->getStatus() == 200) {
            //             echo $response->getBody();
            //         } else {
            //             echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            //                 $response->getReasonPhrase();
            //         }
            //     } catch (HTTP_Request2_Exception $e) {
            //         echo 'Error: ' . $e->getMessage();
            //     }

            // setcookie("msg", "yes"); //to remove cookie after sending message
            $_SESSION['message'] = "Ordered Successfully";
            header("Location: index.php");
        } else {
            echo "Error";
        }
    } else {
        echo "Not Successfully";
    }
}


?>
