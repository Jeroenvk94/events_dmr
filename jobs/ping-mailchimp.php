<?php

include('../includes/config.php');
$query = "SELECT * FROM `settings`";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql)) 
{
    $api_key = $row['key'];
    $dc = $row['dc'];
}

// Prepare Mailchimp connection
$auth = base64_encode("user:$api_key");

// Initiate cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://$dc.api.mailchimp.com/3.0/ping");
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json",
                                        "Authorization: Basic $auth"));
curl_setopt($ch, CURLOPT_USERAGENT, "PHP-MCAPI/2.0");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$result = curl_exec($ch);
$clean = json_decode($result, true);
if($clean['health_status'] == "Everything's Chimpy!" )
{
    $status = "Online";
} else 
{
    $status = "Offline";
}

echo $status;

?>