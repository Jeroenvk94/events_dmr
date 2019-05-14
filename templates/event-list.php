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
                <h1 class="h3 mb-0 text-gray-800"><?php echo $stringEventList; ?></h1>
                <a href="/events/new-event"><button class="btn btn-primary btn-user btn-block"><?php echo $stringNewEvent; ?></button></a>
                <a href=""><button class="btn btn-success btn-user btn-block" onclick="ToExcelReport();" id="btnExport"><?php echo $stringExport; ?></button></a>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tb1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo $stringEventName; ?></th>
                                    <th><?php echo $stringEventDate; ?></th>
                                    <th><?php echo $stringEventCity; ?></th>
                                    <th><?php echo $stringEventAttendance; ?></th>
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
<span><?php echo $stringUserInfo; ?></span>
</div>
</div>
</footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->  