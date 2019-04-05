<?php 
$query = "SELECT * FROM `event_settings`";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{
    $settings_geocode = $row['geocode'];
}
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Event API settings</h1>
            </div>

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                <form method="post" class="user" action="/controller/eventsettingscontroller">
                <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Geocode API Key</h1>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="api" placeholder="Enter API Key" value="<?php echo $settings_geocode; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-user btn-block" placeholder="Enter API Key" value="Change credentials">
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
                <span>Copyright &copy; Your Website 2019</span>
            </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->  