<?php
  
  require "Services/Twilio.php";
 
  $sid = $_GET['id'];
  //$sid = "ACXXXXXX"; // The customer's AccountSid
  $token = "27019bb0e54d4899aa4220b45d64e77b"; // Your account's AuthToken
     
  // create a new instance of the Twilio REST client
  $client = new Services_Twilio($sid, $token);
 
  // request the call logs for the customer's account
  // and write them out
  foreach($client->account->calls as $call) 
  {
    echo "Call {$call->sid}: {$call->duration} seconds\n";
  }
?>