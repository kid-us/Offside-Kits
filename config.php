<?php

require("stripe-php-master/init.php");

$publishableKey=
"pk_test_51KmARWC1vnRWUUD4VR8NF4E7d9eTwsAjEEBaGr4msJUOSSV9VGVNZ75FDpYFWL5uU7TYPSryWf3tX8McRErhh93600RpBA1oak";

$secretKey = "sk_test_51KmARWC1vnRWUUD4a2BAo6BosfnhTGsWUv75lJ9K0sjQamVwUkNNWbpXB7I08nsL7fePfpM2BhKD2LgxcVejKG9p008DeD4eza";

\Stripe\Stripe::setApiKey($secretKey);
?>