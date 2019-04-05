<?php

include('../includes/config.php');

$mail = $_POST['mail'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];
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
    $prepare = "INSERT INTO `admins` (`mail`,`pass`,`firstname`,`lastname`,`company`,`address`,`city`,`zip`,`country`,`admin`,`loyalty`,`mailchimp`,`events`) VALUES ('$mail','$hash','$firstname','$lastname','$company','$address','$city','$zip','$country','$admin','$loyalty','$mailchimp','$events')";
    $execute = mysqli_query($con,$prepare);
    if($execute)
    {
        header('location: ../manager/users');
    }
}