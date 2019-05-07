<?php

include('../includes/config.php');

// Get the settings
$query3 = "SELECT * FROM `loyalty_settings`";
$sql3 = mysqli_query($con,$query3);
while($row = mysqli_fetch_assoc($sql3))
{
    $token = $row['token'];
    $mail = $row['mail'];
    $pass = $row['password'];
}

$eventId = $_POST['event'];
$attendeeName = $_POST['name'];
$attendeeCompany = $_POST['company'];
$attendeeMail = $_POST['mail'];
$attendeeOptIn = $_POST['optin'];
$attendeePartner = $_POST['partner'];

$query99 = "SELECT * FROM `settings` WHERE `partner` = '$attendeePartner'";
$sql99 = $con->query($query99);
while($row2 = mysqli_fetch_assoc($sql99))
{
    $copernicaKey = $row2['key'];
    $copernicaDatabase = $row2['dbase'];
}

$query = "INSERT INTO `participants` (`name`,`mail`,`company`,`event_id`,`optin`) VALUES ('$attendeeName','$attendeeMail','$attendeeCompany','$eventId','$attendeeOptIn')"; 
$sql = mysqli_query($con,$query);
if($sql)
{
    $query2 = "UPDATE `events` SET `attendance` = attendance + 1 WHERE `id` = '$eventId'";
    $sql2 = mysqli_query($con,$query2);

    // Create the Walnut Card
    $data = array(
        "userName" => $attendeeName,
        "userEmail" => $attendeeMail,
        "sendUserPass" => false
    );

    $json_data = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://walnutpasses.com/api/v1/store/$token/pass/");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    curl_setopt($ch, CURLOPT_USERAGENT, "PHP-MCAPI/2.0");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

    $result = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $clean = json_decode($result, true);
    $walnutPass = $clean['passIdentifier'];
    $url = "https://www.walnutapp.com/get/$walnutPass";

    $query4 = "UPDATE `participants` SET `walnut` = '$url' WHERE `event_id` = '$eventId' AND `mail` = '$attendeeMail'";
    $sql4 = mysqli_query($con,$query4);
    if($sql4 && $partner == 'DataMatch')
    {
        require_once('../includes/CopernicaClient.php');

        $api = new CopernicaRestApi("$copernicaKey");

        $fields = array(
            'Voornaam' => $attendeeName,
            'Walnut_Pass' => $url,
            'Event_id' => $eventId,
            'Send_confirmation' => '1',
            "Email" => $attendeeMail
        );

        $data2 = array(
            'fields' => $fields
        );

        $request = $api->post("database/$copernicaDatabase/profiles", $data2);

        $query5 = "UPDATE `participants` SET `confirmation` = '1' WHERE `event_id` = '$eventId' AND `mail` = '$attendeeMail'";
        $sql5 = $con->query($query5);
        if($sql5)
        {
            header('location: ../public/registration-success');
        }
    }
    elseif($sql4 && $partner != 'DataMatch')
    {
        header('location: ../public/registration-success');
    }

}

?>