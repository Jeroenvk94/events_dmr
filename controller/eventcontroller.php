<?php

include('../includes/config.php');

$eventName = $_POST['name'];
$eventVenue = $_POST['venue'];
$eventAddress = $_POST['address'];
$eventZIP = $_POST['zip'];
$eventCity = $_POST['city'];
$eventDate = $_POST['date'];
$eventTime = $_POST['time'];
$eventParticipants = $_POST['attendees'];

$query = "INSERT INTO `events` (`name`,`date`,`time`,`venue_name`,`venue_address`,`venue_zipcode`,`venue_city`,`required_participants`) VALUES ('$eventName','$eventDate','$eventTime','$eventVenue','$eventAddress','$eventZIP','$eventCity','$eventParticipants')";
$sql = mysqli_query($con,$query);
if($sql)
{
    header('location: ../events/event-list');
}

?>