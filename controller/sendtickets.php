<?php
session_start();
$docroot = $_SERVER['DOCUMENT_ROOT'];
include("$docroot/includes/config.php");
include("$docroot/includes/CopernicaClient.php");
$uid = $_SESSION['id'];

$query = "SELECT * FROM `admins` WHERE `id` = '$uid'";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{
  $user_partner = $row['partner'];
}

// Get the email settings
$query2 = "SELECT * FROM `settings` WHERE `partner` = '$user_partner'";
$sql2 = $con->query($query2);
while($row2 = $sql2->fetch_assoc())
{
    $copernicaKey = $row2['key'];
    $copernicaDatabase = $row2['dbase'];

    $query3 = "SELECT * FROM `participants` WHERE `partner` = '$user_partner' AND `ticket_sent` = '0'";
    $sql3 = $con->query($query3);
    while($row3 = $sql3->fetch_assoc())
    {
        $userCopernica = $row3['copernica_id'];
        $userId = $row3['id'];
        $api = new CopernicaRestApi("$copernicaKey");

        $data = array(
            "Send_ticket" => "1"
        );

        $request = $api->put("profile/$userCopernica/fields", $data);

        $query4 = "UPDATE `participants` SET `ticket_sent` = '1' WHERE `id` = '$userId'";
        $sql4 = $con->query($query4);
        if($sql4)
        {
            header_remove();
            header('location: ../events/tickets-sent');
        }
    }

}



?>