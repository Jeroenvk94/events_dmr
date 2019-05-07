<?php
include('../includes/config.php');
$id = $_GET['id'];
$query = "DELETE FROM `partners` WHERE `id` = '$id'";
$sql = mysqli_query($con,$query);
if($sql)
{
    header('location: ../manager/partners');
}
?>