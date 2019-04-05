<?php
session_start();
include('../includes/config.php');
$uid = $_SESSION['id'];

$mail = $_POST['mail'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];

$query = "UPDATE `admins` SET `mail`= '$mail',`firstname`='$firstname',`lastname`='$lastname',`company`='$company',`address`='$address',`city`='$city',`country`='$country',`zip`='$zip' WHERE `id` = '$uid'";
$sql = mysqli_query($con,$query);
if($sql)
{
    header('location: ../user/profile');
}

?>