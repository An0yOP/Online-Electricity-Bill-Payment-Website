<?php
require_once "vendor/autoload.php";


use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = 'ACa1327b231c4ae2d28cab8768f57bd246';
$token = '4b2025eab47e44fc3bd2f29e186997f2';

$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("+919073108721", // to
                           [
                               "body" => "Bopoking Successful",
                               "from" => "+12707517165"
                           ]
                  );

print($message->sid);
echo"Messege sent successfully";
?>