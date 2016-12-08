<?php
require_once('AfricasTalkingGateway.php');
$username   = sms_username;
$apikey     = sms_api_key;
$gateway    = new AfricasTalkingGateway($username, $apikey);
$sid 		= alphanumeric_key;

try 
{ 
  $results = $gateway->sendMessage($recipients, $message, $sid);		
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
