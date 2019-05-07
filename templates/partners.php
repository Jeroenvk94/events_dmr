
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard users</h1>
    <a href="/actions/upload-subscribers" data-toggle="modal" data-target="#partnerModal"><button class="btn btn-primary btn-user btn-block">New partner</button></a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Partner Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM `partners`";
                        $sql = mysqli_query($con,$query);
                        while($row = mysqli_fetch_assoc($sql))
                        {
                            $name = $row['name'];
                            $id = $row['id'];

                            echo '
                            <tr>
                                <td>'.$name.'</td>
                                <td><a href="/controller/deletepartner?id='.$id.'"><button class="btn btn-danger btn-user btn-block">Delete</button></a>
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