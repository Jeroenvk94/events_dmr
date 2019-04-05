<?php

$eventId = $_GET['id'];

$eventApi = "SELECT * FROM `event_settings`";
$eventSql = mysqli_query($con,$eventApi);
while($row2 = mysqli_fetch_assoc($eventSql))
{
    $eventGeocode = $row2['geocode'];
}

// Retrieve event information
$query = "SELECT * FROM `events` WHERE `id` = '$eventId'";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{
    $eventName = $row['name'];
    $eventVenue = $row['venue_name'];
    $eventAddress = $row['venue_address'];
    $eventCity = $row['venue_city'];
    $eventRequiredParticipants = $row['required_participants'];
    $eventAttendance = $row['attendance'];
    $eventDate = $row['date'];
    $eventTime = $row['time'];
    $eventZipCode = $row['venue_zipcode'];

    $attendanceDivision = $eventAttendance / $eventRequiredParticipants;
    $attendancePercentage = $attendanceDivision * 100;
    
    // Create startdate
    $datetime = $eventDate.' '.$eventTime;
    $input = date("Ymd\This",strtotime($datetime));

    // Create enddate
    $eventEndTime = date('H:i',strtotime('+2 hours',strtotime($eventTime)));
    $datetime2 = $eventDate.' '.$eventEndTime;
    $input2 = date("Ymd\This",strtotime($datetime2));

}

?>

  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $eventName; ?></h1>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Event Location</h1>
                        <table class="table">
                        <tr>
                            <td>Venue</td>
                                <td><?php echo $eventVenue; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?php echo $eventAddress; ?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><?php echo $eventCity; ?></td>
                            </tr>
                            <tr>
                                <td>ZIP Code</td>
                                <td><?php echo $eventZipCode; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-6">
                <div class="p-5">
                    <div>
                        <h1 class="h4 text-gray-900 mb-4">Event Statistics</h1>
                        <h4 class="h5 text-gray-900 mb-4">Attendance</h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width:<?php echo "$attendancePercentage%"; ?>" aria-valuenow="<?php echo $attendancePercentage;?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p><?php echo number_format($attendancePercentage, 2); ?> %</p>
                        <a href="/events/view-attendees?id=<?php echo $eventId; ?>"><button class="btn btn-primary btn-user btn-block">View attendees</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-5">
                    <div>
                        <h1 class="h4 text-gray-900 mb-4">Recent Attendees</h1>
                        <table class="table table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Email Address</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $query3 = "SELECT * FROM `participants` WHERE `event_id` = '$eventId' ORDER BY `id` DESC LIMIT 5";
                                    $sql3 = mysqli_query($con,$query3);
                                    while($row3 = mysqli_fetch_assoc($sql3))
                                    {
                                        $attendeeId = $row3['id'];
                                        $attendeeName = $row3['name'];
                                        $attendeeMail = $row3['mail'];

                                        echo '
                                        <tr>
                                            <td>'.$attendeeName.'</td>
                                            <td>'.$attendeeMail,'</td>
                                        ';

                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
    <span>Copyright &copy; Your Website 2019</span>
</div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->  