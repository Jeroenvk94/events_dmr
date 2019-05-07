<?php

include('../includes/config.php');

$name = $_POST['name'];

$prepare = "INSERT INTO `partners` (`name`) VALUES ('$name')";
$execute = mysqli_query($con,$prepare);
if($execute)
{
    $query = "INSERT INTO `settings` (`partner`) VALUES ('$name')";
    $sql = $con->query($query);
    if($sql)
    {
        header('location: ../manager/partners');
    }
}