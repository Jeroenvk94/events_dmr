<?php

include('../includes/config.php');

// Get the attendee values
$attendeeName = $_POST['name'];
$attendeeMail = $_POST['mail'];
$attendeePartner = $_POST['partner'];
$attendeeEvent = $_POST['event'];

// Get the settings
$query3 = "SELECT * FROM `loyalty_settings`";
$sql3 = mysqli_query($con,$query3);
while($row = mysqli_fetch_assoc($sql3))
{
    $token = $row['token'];
    $mail = $row['mail'];
    $pass = $row['password'];
}

$query99 = "SELECT * FROM `settings` WHERE `partner` = '$attendeePartner'";
$sql99 = $con->query($query99);
while($row2 = mysqli_fetch_assoc($sql99))
{
    $copernicaKey = $row2['key'];
    $copernicaDatabase = $row2['dbase'];
    $copernicaCollection = $row2['collection'];
}

// Create the Walnut Card
$data = array(
    "userName" => $attendeeName,
    "userEmail" => $attendeeMail,
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
$walnutPass = $clean['passIdentifier'];
$url = "https://www.walnutapp.com/get/$walnutPass";

var_dump($http_code);

