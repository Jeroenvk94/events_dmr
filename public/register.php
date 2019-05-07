<?php
include('../includes/config.php');
$eventId = $_GET['id'];
$partner = $_GET['partner'];

$query = "SELECT * FROM `events` WHERE `id` = '$eventId'";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{
  $eventName = $row['name'];
  $eventAddress = $row['venue_address'];
  $eventCity = $row['venue_city'];
  $eventZipCode = $row['venue_zipcode'];
  $eventDate = $row['date'];
  $eventTime = $row['time'];

  $eventTimeFormat = date("H:i", strtotime($eventTime));
  $eventDateFormat = date("d-m-Y", strtotime($eventDate));

}
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
  <link rel="shortcut icon" href="https://www.datamatch.nl/wp-content/uploads/2018/01/favicon.png">

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
				  				  <img src="http://evenementen.datamatch.nl/img/logo%2025px%20kleur.png" style="display:block;position:center;margin-top:70px;margin-left:50px;width:150px;margin-bottom:5px">
                  <img src="https://www.datamatch.nl/wp-content/uploads/2017/10/Logo.png" style="display:block;position:center;margin-top:70px;margin-left:50px;width:250px">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Jouw inschrijving!</h1>
                    <p>Leuk dat je één van onze events wilt komen bezoeken.</p>
                    <p>Vergeet niet hieronder de gevraagde gegevens in te vullen, zodat we je per e-mail een ticket kunnen toezenden. Deze ontvang je uiterlijk 1 dag voor het evenement.</p>
					              <h4 class="text-center h4 text-gray-900 mb-4"><?php echo $eventName; ?></h4>
            <p class="text-center">
              <?php echo $eventDateFormat; ?> <?php echo $eventTimeFormat; ?>
              <br/>
              <?php echo $eventAddress; ?>
              <br/>
              <?php echo $eventZipCode; ?>  <?php echo $eventCity; ?>
            </p>
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
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Jouw gegevens</h1>
                    <form method="post" action="/controller/attendeecontroller">
                    <input type="hidden" name="event" value="<?php echo $eventId; ?>">
                    <input type="hidden" name="partner" value="<?php echo $partner; ?>">
                      <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="mail" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Vul een geldig e-mailadres in" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="name" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Volledige naam" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="company" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Bedrijfsnaam" required>
                      </div>
                      <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" name="optin" value="1" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Ja, ik wil in de toekomst ook nieuwsbrieven van DBF Loyalty Groep B.V. ontvangen</label>
                            </div>
                        </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Registreer">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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
