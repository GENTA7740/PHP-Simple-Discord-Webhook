<?php
$webhookurl = "https://discord.com/api/webhooks/856409270585131008/i_zPpuqPE02LaURtpxVVdjXksYoyhah_XVA0n6ouJQkbCA537medzFQYWEeOH77uqGr6";
$feedback = $_POST['Message'];
$username = $_POST['Username'];
$timestamp = date('h:i:s');
$json_data = json_encode([
    "content" => "".$feedback."\n",
    "username" => $username,
    //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",
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