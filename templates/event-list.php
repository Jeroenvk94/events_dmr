<?php 
if(isset($_POST['submit']))
{
    $list_id = $_POST['list_id'];
}
?>
<!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Event List</h1>
                <a href="/events/new-event"><button class="btn btn-primary btn-user btn-block">Create new event</button></a>
                <a href=""><button class="btn btn-success btn-user btn-block" onclick="ToExcelReport();" id="btnExport">Export event list</button></a>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tb1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Event name</th>
                                    <th>Event date</th>
                                    <th>Event city</th>
                                    <th>Event attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM `events` ORDER BY `id` DESC";
                                    $sql = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_assoc($sql))
                                    {
                                        $name = $row['name'];
                                        $date = $row['date'];
                                        $city = $row['venue_city'];
                                        $id = $row['id'];
                                        $requiredParticipants = $row['required_participants'];
                                        $currentAttendance = $row['attendance'];
                                        $attendance_ratio = $currentAttendance / $requiredParticipants;
                                        $attendancePercentage = $attendance_ratio * 100;
                                        $attendancePercentageShow = number_format($attendancePercentage, 2);

                                        echo '
                                        <tr>
                                            <td><a href="/events/view-event?id='.$id.'">'.$name.'</a></td>
                                            <td>'.$date.'</td>
                                            <td>'.$city.'</td>
                                            <td>'.$attendancePercentageShow.' %</td>

                                        ';

                                    }
                                ?>
                            </tbody>
                        </table>
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
                <span>Copyright &copy; DataMatch Loyalty Marketing 2019</span>
            </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->  