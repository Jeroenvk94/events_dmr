<?php 
$eventId = $_GET['id'];
?>

<!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?php echo $stringAttendeeList; ?></h1>
                <a href="" target="_blank"><button class="btn btn-success btn-user btn-block" onclick="ToExcelReport();" id="btnExport"><?php echo $stringExport; ?></button></a>
                <!-- <a href="/controller/sendtickets"><button class="btn btn-warning btn-user btn-block">Send Tickets</button></a> -->
            </div>
            

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tb1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo $stringName; ?></th>
                                    <th><?php echo $stringMail; ?></th>
                                    <th><?php echo $stringCompany; ?></th>
                                    <th><?php echo $stringTicketURL; ?></th>
                                    <th><?php echo $stringEventId; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM `participants` WHERE `event_id` = '$eventId' AND `partner` = '$user_partner'";
                                    $sql = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_assoc($sql))
                                    {
                                        $mail = $row['mail'];
                                        $name = $row['name'];
                                        $company = $row['company'];
                                        $walnut = $row['walnut'];

                                        echo '
                                        <tr>
                                            <td>'.$name.'</td>
                                            <td>'.$mail.'</td>
                                            <td>'.$company.'</td>
                                            <td>'.$walnut.'</td>
                                            <td>'.$eventId.'</td>

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