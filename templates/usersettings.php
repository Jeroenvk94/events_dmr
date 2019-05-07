<?php 

if(isset($_POST['submit']))
{

    $old = $_POST['old'];

    $check_passwords = password_verify($old,$user_pass);

    if($check_passwords)
    {
        $pass_new = $_POST['new'];
        $pass_confirm = $_POST['confirm'];

        if($pass_new == $pass_confirm)
        {
            $hash = password_hash($pass_new,PASSWORD_DEFAULT);
            $query = "UPDATE `admins` SET `pass` = '$hash' WHERE `id` = '$uid'";
            $sql = mysqli_query($con,$query);

            if($sql)
            {
                $error = '<h4 class="text-success">Password successfully changed</h4>';
            }

        }
        else
        {
            $error = '<h4 class="text-danger">New passwords do not match</h4>';
        }

    }
    else 
    {
        $error = '<h4 class="text-danger">Old password does not match our records</h4>';
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User settings</h1>
    <?php
        if($error != NULL)
        {
            echo $error;
        }
    ?>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Your password</h1>
                        <form class="user" method="post">
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="old" placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="new" placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="confirm" placeholder="Confirm Password">
                            </div>
                            <input type="submit" name="submit" value="Change Password" class="btn btn-primary btn-user btn-block">
                        </form>
                    </div>
                </div>
            </div>
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