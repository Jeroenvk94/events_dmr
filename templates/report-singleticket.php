<?php 
if(isset($_POST['submit']))
{
    $eventIdPost = $_POST['list_id'];
}
?>
<!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Single tickets report</h1>
                <a href=""><button class="btn btn-success btn-user btn-block" onclick="ToExcelReport();" id="btnExport">Export</button></a>
            </div>
            <form method="post">
              <select name="list_id">
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
                <input type="submit" value="Filter" class="btn btn-primary btn-user btn-block" style="width:100px;margin-top:10px;margin-bottom:10px" name="submit">
            </form>
          <!-- Content Row -->

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tb1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Ticket URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!$eventIdPost)
                                    {
                                        $query = "SELECT * FROM `participants` WHERE `type` = 'Single' AND `partner` = '$user_partner'";
                                        $sql = mysqli_query($con,$query);
                                        while($row = mysqli_fetch_assoc($sql))
                                        {
                                            $subscriberName = $row['name'];
                                            $subscriberMail = $row['mail'];
                                            $subscriberPass = $row['walnut'];

                                            echo '
                                            <tr>
                                                <td>'.$subscriberName.'</td>
                                                <td>'.$subscriberMail.'</td>
                                                <td>'.$subscriberPass.'</td>
                                            ';

                                        }
                                    } else 
                                    {
                                        $query = "SELECT * FROM `participants` WHERE `type` = 'Single' AND `partner` = '$user_partner' AND `event_id` = '$eventIdPost'";
                                        $sql = $con->query($query);
                                        while($row = $sql->fetch_assoc())
                                        {
                                            $attendeeName = $row['name'];
                                            $attendeeMail = $row['mail'];
                                            $attendeePass = $row['walnut'];

                                            echo '
                                            <tr>
                                                <td>'.$attendeeName.'</td>
                                                <td>'.$attendeeMail.'</td>
                                                <td>'.$attendeePass.'</td>
                                            ';

                                        }
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