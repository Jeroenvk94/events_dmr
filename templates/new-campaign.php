 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Mailchimp campaign - new</h1>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <form method="post" class="user" action="/controller/campaigncontroller">
        <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-md-12">
                    <div class="p-5">
                        <h3 class="text-gray-900 mb-4">Pick a recipient list</h3>
                        <select name="list">
                            <?php 
                                $query = "SELECT * FROM `lists`";
                                $sql = mysqli_query($con,$query);
                                while($row = mysqli_fetch_assoc($sql))
                                {
                                    $list_name = $row['name'];
                                    $list_id = $row['list_id'];

                                    echo '
                                    <option value='.$list_id.'>'.$list_name.'</option>
                                    ';

                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="p-5">
                        <h3 class="text-gray-900 mb-4">Pick a template</h3>
                        <select name="template">
                            <?php 
                                $query = "SELECT * FROM `templates`";
                                $sql = mysqli_query($con,$query);
                                while($row = mysqli_fetch_assoc($sql))
                                {
                                    $template_name = $row['name'];
                                    $template_id = $row['mailchimp_id'];

                                    echo '
                                    <option value='.$template_id.'>'.$template_name.'</option>
                                    ';

                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Campaign information</h1>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="subject" placeholder="Enter email subject">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="title" placeholder="Enter campaign title">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="sender" placeholder="Enter sender name">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Create campaign">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
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