<?php

include('../includes/config.php');
$eventId = $_POST['eventid'];
$eventName = $_POST['name'];
$eventVenue = $_POST['venue'];
$eventAddress = $_POST['address'];
$eventZIP = $_POST['zip'];
$eventCity = $_POST['city'];
$eventDate = $_POST['date'];
$eventTime = $_POST['time'];
$eventParticipants = $_POST['attendees'];

$query = "UPDATE `events` SET `name` = '$eventName',`venue_name` = '$eventVenue',`venue_address` = '$eventAddress', `venue_zipcode` = '$eventZIP',`venue_city` = '$eventCity',`required_participants` = '$eventParticipants',`date` = '$eventDate',`time` = '$eventTime' WHERE `id` = '$eventId'";
$sql = mysqli_query($con,$query);
if($sql)
{
    header('location: ../events/event-list');
}

?>