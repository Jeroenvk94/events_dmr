 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Send a single ticket</h1>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <form method="post" action="/controller/attendeecontroller.php">
    <input type="hidden" name="partner" value="<?php echo $user_partner; ?>">
    <input type="hidden" name="type" value="Single">
    <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="p-5">
                    <div class="text-center">
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="mail" placeholder="Attendee email address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" placeholder="Attendee name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="company" placeholder="Attendee company" required>
                        </div>
                        <div class="form-group">
                        <select name="event">
                            <?php 
                                $query = "SELECT * FROM `events`";
                                $sql = mysqli_query($con,$query);
                                while($row = mysqli_fetch_assoc($sql))
                                {
                                    $eventName = $row['name'];
                                    $eventId = $row['id'];

                                    echo '
                                    <option value='.$eventId.'>'.$eventName.'</option>
                                    ';

                                }
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Create ticket">
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