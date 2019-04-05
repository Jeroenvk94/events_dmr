<?php
include('../includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Events - Inschrijven</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Questrial:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                  <img src="https://www.datamatch.nl/wp-content/uploads/2017/10/Logo.png" style="display:block;position:center;margin-top:70px;margin-left:50px">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welkom!</h1>
                    <p>Via deze pagina is het makkelijk om je in te schrijven voor één van onze events!</p>
                    <p>Na de inschrijving ontvang je direct van ons een ticket waarmee je je op het event kunt aanmelden.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
              </div>

              <?php
                  $query = "SELECT * FROM `events` WHERE `attendance` != `required_participants` LIMIT  3";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_assoc($sql))
                  {
                    $eventId = $row['id'];
                    $eventName = $row['name'];
                    $eventVenue = $row['venue_name'];
                    $eventDate = $row['date'];
                    $eventTime = $row['time'];
                    $eventAddress = $row['venue_address'];
                    $eventCity = $row['venue_city'];
                    $eventZipCode = $row['venue_zipcode'];
                    $eventMaximumParticipants = $row['required_participants'];

                    echo '
                    <div class="col-lg-4 text-center">
                      <h3>'.$eventName.'</h3>
                      <p>
                        '.$eventVenue.'
                      <br/>
                        '.$eventAddress.'
                      <br/>
                        '.$eventZipCode.'
                      <br/>
                        '.$eventCity.'
                      <br/>
                        '.$eventDate.' '.$eventTime.'
                      </p>
                      <a href="/public/register?id='.$eventId.'"><button class="btn btn-primary btn-user" style="margin:5px">Registreer</button></a>
                    </div>
                    
                    ';

                  }

              ?>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>
