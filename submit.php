<?php

session_start();

require_once('vendor/autoload.php');
include ("Php/conn.php");
require ("config.php");

if (isset($_POST['size'])){
    $size = $_POST['size'];   
}

if(isset($_POST['quantity'])){
    $quantity = $_POST['quantity'];
}

if(isset($_POST["stripeToken"])){
    $token = $_POST["stripeToken"];
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $buyerName= mysqli_real_escape_string($conn,$_POST['name']);
    $email = $_POST["stripeEmail"];
    $customerEmail = mysqli_real_escape_string($conn,$_POST["email-address"]);    
    $description = mysqli_real_escape_string($conn,$_POST['item-name']);
    $address = mysqli_real_escape_string($conn,$_POST["address"]);
    $price = $_POST["price"];
    $image = $_POST['image'];
    $date = date("d/m/Y");
    $id = $buyerName."".$phone."".rand(1, 5000);



    $sql = "INSERT INTO store (customerName, customerPhone, customerEmail, customerAddress, productName, productPrice, orderedId, payed, date, size, image, quantity) VALUES ('$buyerName','$phone','$customerEmail','$address','$description','$price', '$id', '0','$date', '$size', '$image', $quantity)"; 
       $result = mysqli_query($conn, $sql);

    $data = \Stripe\Charge::create([
        'amount'=>'500',
        'currency' => 'usd',
        'amount' => intval($price)*100,
        'description' => $id,
        'source'=>$token,
    ]);

    if($data){

        $orderId = $data->description;

        $sql = "UPDATE store SET payed = '1' WHERE orderedId = '$orderId'";
        $res=mysqli_query($conn, $sql);

        if($res){

    
            $msg =  "Offside Kits. Dear customer $buyerName thank you for choosing us! Your purchased item ($description) will delivered within one week at $address. Visit us again!";

        
            $request = new HTTP_Request2();
            $request->setUrl('https://api.telda.com.et/api/write/SendMessage');
            $request->setMethod(HTTP_Request2::METHOD_POST);
            $request->setConfig(array(
            'follow_redirects' => TRUE
            ));
            $request->setHeader(array(
            'accept' => 'text/plain',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic Rcyi4/FN2kjlIHfV1gm3RIYcAEYM5mESMTAwMDkzNjIzMTIyNQ=='
            ));
            
            $request->setBody('{"phone":"'.$phone.'","message":"'.$msg.'"}');
            
            try {
                $response = $request->send();
                if ($response->getStatus() == 200) {
                    echo $response->getBody();
                }else {
                    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                    $response->getReasonPhrase();
                }
            }
            catch(HTTP_Request2_Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }

            $_SESSION['message'] = "Ordered Successfully";           
            header("Location: index.php");
        }else{
            echo "Error";
        }
    }
    else{
        echo "Not successfull";
    }
}

?>