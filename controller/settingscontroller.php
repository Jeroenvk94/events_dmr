<?php

include('../includes/config.php');

$apikey = $_POST['api'];
$username = $_POST['user'];
$pass = $_POST['pass'];
$dc = $_POST['dc'];
$database = $_POST['database'];
$collection = $_POST['collection'];
$id = $_POST['settingsid'];

$query = "UPDATE `settings` SET `key` = '$apikey', `username` = '$username', `password` = '$pass', `dc` = '$dc',`collection` = '$collection', `dbase` = '$database' WHERE `id` = '$id'";
$sql = mysqli_query($con,$query);
if($sql)
{
    header('location: ../mail/mail-settings');
}

?>