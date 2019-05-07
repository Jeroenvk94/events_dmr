 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User profile</h1>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Your profile</h1>
                        <form class="user" action="/controller/profilecontroller.php" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="mail" aria-describedby="emailHelp" value="<?php echo $user_mail; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="firstname" value="<?php echo $user_firstname; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="lastname" value="<?php echo $user_lastname; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="company" value="<?php echo $user_company; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="address" value="<?php echo $user_address; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="city" value="<?php echo $user_city; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="zip" value="<?php echo $user_zip; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="country" value="<?php echo $user_country; ?>">
                            </div>
                            <br/><br/>
                            <input type="submit" value="Change Profile" class="btn btn-primary btn-user btn-block">
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
<span>Copyright &copy; DataMatch Loyalty Marketing 2019</span>
</div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->  