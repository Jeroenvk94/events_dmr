<?php 
$query = "SELECT * FROM `settings`";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{
    $settings_user = $row['username'];
    $settings_pass = $row['password'];
    $settings_akey = $row['key'];
    $settings_dc = $row['dc'];
}
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Copernica settings</h1>
            </div>

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                <form method="post" class="user" action="/controller/settingscontroller">
                <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Copernica User Account</h1>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="user" placeholder="Enter Username" value="<?php echo $settings_user; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="pass" placeholder="Enter Password" value="<?php echo $settings_pass; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Copernica API Token</h1>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="api" placeholder="Enter API Key" value="<?php echo $settings_akey; ?>">
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