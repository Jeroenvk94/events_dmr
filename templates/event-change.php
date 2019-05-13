 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">New event</h1>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <form method="post" class="user" action="/controller/eventchangecontroller">
    <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Event information</h1>
                        <?php 
                            $eventId = $_GET['id'];

                            $query = "SELECT * FROM `events` WHERE `id` = '$eventId'";
                            $sql = $con->query($query);
                            while($row = $sql->fetch_assoc())
                            {
                                $eventName = $row['name'];
                                $eventVenue = $row['venue_name'];
                                $eventAddress = $row['venue_address'];
                                $eventZipCode = $row['venue_zipcode'];
                                $eventCity = $row['venue_city'];
                                $maximumAttendees = $row['required_participants'];
                                $eventDate = $row['date'];
                                $eventTime = $row['time'];
                            }

                        ?>
                        <input type="hidden" name="eventid" value="<?php echo $eventId; ?>">
                        <div class="form-group">
                            Name <input type="text" class="form-control form-control-user" name="name" value="<?php echo $eventName; ?>" >
                        </div>
                        <div class="form-group">
                            Venue name<input type="text" class="form-control form-control-user" name="venue" value="<?php echo $eventVenue; ?>" >
                        </div>
                        <div class="form-group">
                            Address<input type="text" class="form-control form-control-user" name="address" value="<?php echo $eventAddress; ?>">
                        </div>
                        <div class="form-group">
                            ZIP Code<input type="text" class="form-control form-control-user" name="zip" value="<?php echo $eventZipCode; ?>">
                        </div>
                        <div class="form-group">
                            City<input type="text" class="form-control form-control-user" name="city" value="<?php echo $eventCity; ?>" >
                        </div>
                        <div class="form-group">
                            Maximum attendees<input type="number" class="form-control form-control-user" name="attendees" value="<?php echo $maximumAttendees; ?>" >
                        </div>
                        <div class="form-group">
                            Date<input type="date" class="form-control form-control-user" name="date" value="<?php echo $eventDate; ?>" >
                        </div>
                        <div class="form-group">
                            Time<input type="time" class="form-control form-control-user" name="time" value="<?php echo $eventTime; ?>" >
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Create event">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
<span>Copyright &copy; DataMatch Loyalty Marketing 2019</span>
</div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->  