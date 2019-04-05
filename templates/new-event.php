 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">New event</h1>
</div>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <form method="post" class="user" action="/controller/eventcontroller">
    <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Event information</h1>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" placeholder="Event name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="venue" placeholder="Event venue" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="address" placeholder="Venue address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="zip" placeholder="Venue ZIP code">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="city" placeholder="Venue city" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="attendees" placeholder="Maximum amount of attendees" required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control form-control-user" name="date" placeholder="Email address" required>
                        </div>
                        <div class="form-group">
                            <input type="time" class="form-control form-control-user" name="time" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Create event">
                        </div>
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