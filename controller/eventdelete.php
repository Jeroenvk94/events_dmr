<?php
include('../includes/config.php');
$id = $_GET['id'];
$query = "DELETE FROM `events` WHERE `id` = '$id'";
$sql = mysqli_query($con,$query);
if($sql)
{
    $query2 = "DELETE * FROM `participants` WHERE `event_id` = '$id'";
    $sql2 = $con->query($query2);
    if($sql2)
    {
        header('location: ../events/event-list');
    }
    else 
    {
        header('location: ../events/event-list');
    }
}
?>