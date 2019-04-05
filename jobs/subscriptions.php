<?php

include('../includes/config.php');

$list_id = $_POST['list_id'];

$query2 = "SELECT * FROM `settings`";
$sql2 = mysqli_query($con,$query2);
while($row2 = mysqli_fetch_assoc($sql2))
{
    $apikey = $row2['key'];
    $dc = $row2['dc'];
}

$query = "SELECT * FROM `subscribers` WHERE `status` = 'Waiting' AND `list_id` = '$list_id'";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{

    $auth = base64_encode("user:$apikey");

    $data = array (
        "apikey" => $apikey,
        "email_address" => $row['mail'],
        "status" => "subscribed",
        "merge_fields" => array(
            "FNAME" => $row['firstname'],
            "LNAME" => $row['lastname'],
            "TYPE" => $row['characteristic']
        )
    );

    $json_data = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://$dc.api.mailchimp.com/3.0/lists/$list_id//members/");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json",
                                            "Authorization: Basic $auth"));
    curl_setopt($ch, CURLOPT_USERAGENT, "PHP-MCAPI/2.0");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    
    $result = curl_exec($ch);

}


$query3 = "UPDATE `subscribers` SET `status` = 'Processed' WHERE `status` = 'Waiting'";
$sql3 = mysqli_query($con,$query3);
if($sql3)
{
    header('location: ../actions/sync-success');
}


?>