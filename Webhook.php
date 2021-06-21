<?php
$webhookurl = "YOUR_WEBHOOK_URL";
$feedback = $_POST['Message'];
$username = $_POST['Username'];
$timestamp = date('h:i:s');
$json_data = json_encode([
    "content" => "".$feedback."\n",
    "username" => $username,
    //"avatar_url" => "", //URL Avatar for your webhook
    "tts" => false,
    // "file" => "", 
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
echo $response;
curl_close( $ch );
?>
