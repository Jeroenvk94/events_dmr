<?php

include('../includes/config.php');

$mail = $_POST['mail'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];
$partner = $_POST['partner'];
$admin = $_POST['admin'];
$pass = $_POST['pass'];
$loyalty = $_POST['loyalty'];
$mailchimp = $_POST['mailchimp'];
$events = $_POST['events'];

$hash = password_hash($pass,PASSWORD_DEFAULT);

$query = "SELECT * FROM `admins` WHERE `mail` = '$mail'";
$sql = mysqli_query($con,$query);
$rows = mysqli_num_rows($sql);
if($rows > 0)
{
    header('location: ../manager/users');
}
else 
{
    $prepare = "INSERT INTO `admins` (`mail`,`pass`,`firstname`,`lastname`,`company`,`admin`,`loyalty`,`mailchimp`,`events`,`partner`) VALUES ('$mail','$hash','$firstname','$lastname','$company','$admin','$loyalty','$mailchimp','$events','$partner')";
    $execute = mysqli_query($con,$prepare);
    if($execute)
    {
        header('location: ../manager/users');
    }
}