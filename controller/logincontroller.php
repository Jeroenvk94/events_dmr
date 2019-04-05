<?php

session_start();
include('../includes/config.php');

$mail = $_POST['mail'];
$pass = $_POST['pass'];

$query = "SELECT * FROM `admins` WHERE `mail` = '$mail'";
$sql = mysqli_query($con,$query);
$rows = mysqli_num_rows($sql);
if($rows > 0)
{
    while($row = mysqli_fetch_assoc($sql)) 
    {
        $hash = $row['pass'];
        $uid = $row['id'];
    }

    $verification = password_verify($pass,$hash);
    if($verification)
    {
        $_SESSION['login'] = 'true';
        $_SESSION['id'] = $uid;
        header('location: ../dashboard-events');
    } else 
    {
        header('location: ../error?p=wrongpass');
    }
}
else 
{
    header('location: ../error?p=accountnotfound');
}


?>