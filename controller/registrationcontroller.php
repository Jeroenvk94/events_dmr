<?php

session_start();
include('../includes/config.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];

$hash = password_hash($pass,PASSWORD_DEFAULT);

$query = "INSERT INTO `admins` (`firstname`,`lastname`,`mail`,`pass`) VALUES ('$firstname','$lastname','$mail','$hash')";
$sql = mysqli_query($con,$query);
if($sql) 
{
    header('location: ../index');
}

?>