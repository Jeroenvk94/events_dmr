<?php

include('../includes/config.php');

// Get the settings
$query = "SELECT * FROM `loyalty_settings`";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{
    $token = $row['token'];
    $mail = $row['mail'];
    $pass = $row['password'];
}

$memberName = $_POST['name'];
$memberEmail = $_POST['mail'];

// Create the Walnut Card
$data = array(
    "userName" => $memberName,
    "userEmail" => $memberEmail,
    "sendUserPass" => false
);

$json_data = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://walnutpasses.com/api/v1/store/$token/pass/");
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($ch, CURLOPT_USERAGENT, "PHP-MCAPI/2.0");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

$result = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$clean = json_decode($result, true);
$pass_id = $clean['passIdentifier'];

// Insert the customer into the database
$query2 = "INSERT INTO `members` (`mail`,`firstname`,`optin`,`pass_id`,`status`) VALUES ('$memberEmail','$memberName','$optin','$pass_id','1')";
$sql2 = mysqli_query($con,$query2);
if($sql2)
{
    header('location: ../loyalty/loyalty-new-member');
}

?>