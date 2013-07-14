<?php
  
  require "Services/Twilio.php";

  $id = $_GET["id"];
  echo 'id = ' . $id . '<br>';
  $sid = "";

  // store $accountSid value in database
  // associated with a user in your application
  $host = "ec2-54-235-192-45.compute-1.amazonaws.com";
  $user = "tdyqrgijyseefo";
  $pass = "JvAJsxsFD9TC5jQpLq5eWo9Tfk";
  $db = "d53m4i2ddtambf";

  $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
                       or die ("Could not connect to server\n");
  $query = "SELECT sid FROM business WHERE id=".$id;
  $rows = pg_query($con, $query) or die("Cannot execute query: $query\n");
  
  $row = pg_fetch_row($rows); 
  $sid = $row[0]; 
  echo 'sid = ' . $sid . '<br>';

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