        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Events Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-4">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Events</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $query1 = "SELECT * FROM `events`";
                          $sql1 = mysqli_query($con,$query1);
                          $list_amount = mysqli_num_rows($sql1);

                          echo $list_amount;

                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-4">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Average attendance</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $query2 = "SELECT AVG(required_participants) AS average_required FROM `events`";
                            $sql2 = mysqli_query($con,$query2);
                            while($row = mysqli_fetch_assoc($sql2))
                            {   
                                $averageRequired = $row['average_required'];

                                $query3 = "SELECT AVG(attendance) AS average_attendance FROM `events`";
                                $sql3 = mysqli_query($con,$query3);
                                while($row2 = mysqli_fetch_assoc($sql3))
                                {
                                    $averageAttendance = $row2['average_attendance'];

                                    $divide = $averageAttendance / $averageRequired;
                                    $percentage = $divide * 100;

                                    $showPercentage = number_format($percentage, 2);
                                    echo "$showPercentage %";

                                }

                            }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Earnings (Monthly) Card Example -->
             <div class="col-xl-4 col-md-4 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-4">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Latest event</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $query4 = "SELECT * FROM `events` ORDER BY `id` DESC LIMIT 1 ";
                          $sql4 = mysqli_query($con,$query4);
                          while($row3 = mysqli_fetch_assoc($sql4))
                          {
                              $eventName = $row3['name'];
                              echo $eventName;
                          }

                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-forward fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tb1" width="100%" cellspacing="0">
                        <h3>Latest attendees</h3>
                            <thead>
                                <tr>
                                    <th>Attendee Name</th>
                                    <th>Attendee Mail</th>
                                    <th>Attendee Event</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query5 = "SELECT * FROM `participants`  WHERE `partner` = '$user_partner'  ORDER BY `id` DESC LIMIT 25 ";
                                    $sql5 = mysqli_query($con,$query5);
                                    while($row4 = mysqli_fetch_assoc($sql5))
                                    {
                                        $attendeeName = $row4['name'];
                                        $attendeeMail = $row4['mail'];
                                        $attendeeEvent = $row4['event_id'];

                                        $query6 = "SELECT * FROM `events` WHERE `id` = '$attendeeEvent'";
                                        $sql6 = mysqli_query($con,$query6);
                                        while($row5 = mysqli_fetch_assoc($sql6))
                                        {
                                            $attendeeEventName = $row5['name'];
                                        }

                                        echo '
                                        <tr>
                                            <td>'.$attendeeName.'</td>
                                            <td>'.$attendeeMail.'</td>
                                            <td>'.$attendeeEventName.'</td>

                                        ';

                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->