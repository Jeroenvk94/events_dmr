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
                <h1 class="h3 mb-0 text-gray-800">Optin Report</h1>
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
                                    <th>Company</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!$eventIdPost)
                                    {
                                        $query = "SELECT * FROM `participants` WHERE `optin` = '1'";
                                        $sql = mysqli_query($con,$query);
                                        while($row = mysqli_fetch_assoc($sql))
                                        {
                                            $subscriberName = $row['name'];
                                            $subscriberMail = $row['mail'];
                                            $subscriberCompany = $row['company'];

                                            echo '
                                            <tr>
                                                <td>'.$subscriberName.'</td>
                                                <td>'.$subscriberMail.'</td>
                                                <td>'.$subscriberCompany.'</td>
                                            ';

                                        }
                                    } else 
                                    {
                                        $query = "SELECT * FROM `participants` WHERE `optin` = '1' AND `event_id` = '$eventIdPost'";
                                        $sql = mysqli_query($con,$query);
                                        while($row = mysqli_fetch_assoc($sql))
                                        {
                                            $subscriberName = $row['name'];
                                            $subscriberMail = $row['mail'];
                                            $subscriberCompany = $row['company'];

                                            echo '
                                            <tr>
                                                <td>'.$subscriberName.'</td>
                                                <td>'.$subscriberMail.'</td>
                                                <td>'.$subscriberCompany.'</td>
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
                <span>Copyright &copy; Your Website 2019</span>
            </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->  