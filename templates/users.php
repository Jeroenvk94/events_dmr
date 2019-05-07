
<!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard users</h1>
                <a href="/actions/upload-subscribers" data-toggle="modal" data-target="#userModal"><button class="btn btn-primary btn-user btn-block">New user</button></a>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Email Address</th>
                                    <th>First name</th>
                                    <th>Partner</th>
                                    <th>Manager</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM `admins`";
                                    $sql = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_assoc($sql))
                                    {
                                        $mail = $row['mail'];
                                        $firstname = $row['firstname'];
                                        $partner = $row['partner'];
                                        $admin = $row['admin'];
                                        $id = $row['id'];

                                        if($admin == '1')
                                        {
                                            $admin = "Yes";
                                        }
                                        elseif($admin == '0')
                                        {
                                            $admin = "No";
                                        }

                                        echo '
                                        <tr>
                                            <td>'.$mail.'</td>
                                            <td>'.$firstname.'</td>
                                            <td>'.$partner.'</td>
                                            <td>'.$admin.'</td>
                                            <td><a href="/controller/delete-user?id='.$id.'"><button class="btn btn-danger btn-user btn-block">Delete</button></a>
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