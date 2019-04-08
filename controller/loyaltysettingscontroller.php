<?php

include('../includes/config.php');

$apikey = $_POST['api'];
$username = $_POST['user'];
$pass = $_POST['pass'];
$dc = $_POST['dc'];
$sendpass = $_POST['sendpass'];

$query = "UPDATE `loyalty_settings` SET `token` = '$apikey', `mail` = '$username', `password` = '$pass', `sendpass` = '$sendpass'";
$sql = mysqli_query($con,$query);
if($sql)
{
    header('location: ../loyalty/loyalty-settings');
}

?>