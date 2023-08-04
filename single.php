<?php

session_start();
require_once('vendor/autoload.php');
include("Php/conn.php");
require("config.php");

if (isset($_POST["stripeToken"])) {

    $token = $_POST["stripeToken"];
    $buyerName = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $customerEmail = mysqli_real_escape_string($conn, $_POST["email-address"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $itemName = mysqli_real_escape_string($conn, $_POST['Item-name']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $price = $_POST["Item-price"];
    $size = $_POST["Item-size"];
    $image = $_POST['Item-image'];
    $quantity = $_POST['Item-quantity'];
    $totalPayed = intval($price * $quantity);
    $date = date("d/m/Y");

    $id = $buyerName . "" . $phone . "" . rand(1, 5000);

    $sql = "INSERT INTO store (customerName, customerPhone, customerEmail, city, customerAddress, productName, productPrice, orderedId, payed, date, size, image, quantity, totalPayed) VALUES ('$buyerName','$phone','$customerEmail', '$city' ,'$address','$itemName','$price', '$id', '0','$date', '$size', '$image', $quantity, $totalPayed)";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Not Inserted";
    } else {
        Stripe\Stripe::setApiKey('secret key here');

        $data = Stripe\Charge::create([
            "amount" => $totalPayed * 100,
            "currency" => "usd",
            "source" => $token,
            "description" => $id,
        ]);

        if ($data) {

            $orderId = $data->description;

            $sql = "UPDATE store SET payed = '1' WHERE orderedId = '$orderId'";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                // $msg = "Offside Kits. Dear customer $buyerName thank you for choosing us! Your purchased item ($description) will delivered within one week at $address. Visit us again!";


                // $request = new HTTP_Request2();
                // $request->setUrl('https://api.telda.com.et/api/write/SendMessage');
                // $request->setMethod(HTTP_Request2::METHOD_POST);
                // $request->setConfig(
                //     array(
                //         'follow_redirects' => TRUE
                //     )
                // );
                // $request->setHeader(
                //     array(
                //         'accept' => 'text/plain',
                //         'Content-Type' => 'application/json',
                //         'Authorization' => 'Basic Rcyi4/FN2kjlIHfV1gm3RIYcAEYM5mESMTAwMDkzNjIzMTIyNQ=='
                //     )
                // );

                // $request->setBody('{"phone":"' . $phone . '","message":"' . $msg . '"}');

                // try {
                //     $response = $request->send();
                //     if ($response->getStatus() == 200) {
                //         echo $response->getBody();
                //     } else {
                //         echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                //             $response->getReasonPhrase();
                //     }
                // } catch (HTTP_Request2_Exception $e) {
                //     echo 'Error: ' . $e->getMessage();
                // }

                $_SESSION['message'] = "Ordered Successfully";
                header("Location: index.php");
            } else {
                echo "Error";
            }
        } else {
            echo "Not Successful";
        }
    }

}

?>
