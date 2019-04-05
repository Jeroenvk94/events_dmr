<?php

include('../includes/config.php');

$apikey = $_POST['api'];
$username = $_POST['user'];
$pass = $_POST['pass'];
$dc = $_POST['dc'];

$query = "UPDATE `settings` SET `key` = '$apikey', `username` = '$username', `password` = '$pass', `dc` = '$dc'";
$sql = mysqli_query($con,$query);
if($sql)
{
    header('location: ../mail/mail-settings');
}

?>