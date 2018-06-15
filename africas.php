<?php
require_once('AfricasTalkingGateway.php');
$username   = "ben10";
$apikey     = "198b485e59a325b210b31c4858e2e7689166a8aa19e78a4f1b1fd77aa80746c0";
$gateway    = new AfricasTalkingGateway($username, $apikey);
// $sid 		= "alphanumeric_key";

try 
{ 
  $results = $gateway->sendMessage($recipients, $message);		
  foreach($results as $result) {
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}


  $data = $gateway->getUserData();
  echo "<div>Balance: " . $data->balance."</div>";
