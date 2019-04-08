<?php
session_start();
if($_SESSION['login'] != 'true')
{
  $path1 = $_SERVER['DOCUMENT_ROOT'];
  $path1 .= "/index";
  header('location: '.$path1.'');
}

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/includes/config.php";
include_once($path);

$uid = $_SESSION['id'];

$query = "SELECT * FROM `admins` WHERE `id` = '$uid'";
$sql = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($sql))
{
  $user_firstname = $row['firstname'];
  $user_lastname = $row['lastname'];
  $user_mail = $row['mail'];
  $user_company = $row['company'];
  $user_address = $row['address'];
  $user_zip = $row['zip'];
  $user_country = $row['country'];
  $user_city = $row['city'];
  $user_admin = $row['admin'];
  $user_pass = $row['pass'];
  $user_loyalty = $row['loyalty'];
  $user_mailchimp = $row['mailchimp'];
  $user_events = $row['events'];
}

$query4 = "SELECT * FROM `settings`";
$sql4 = mysqli_query($con,$query4);
while($row4 = mysqli_fetch_assoc($sql4))
{
  $dc = $row4['dc'];
  $token = $row4['key'];
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

  <title>Event Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Questrial:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="shortcut icon" href="https://www.datamatch.nl/wp-content/uploads/2018/01/favicon.png">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">

  <style>
     #map {
   width: 100%;
   height: 400px;
   background-color: grey;
 }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard-mailchimp">
        <div class="sidebar-brand-text mx-3">Events<sup>v1</sup></div>
      </a>
      <?php if($user_mailchimp == '1') {?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Copernica
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Settings</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mailchimp:</h6>
            <a class="collapse-item" href="/mail/mail-settings">Account information</a>
          </div>
        </div>
      </li>

      <?php } ?>

      <?php if($user_events == '1') {?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Events
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Event dashboard:</h6>
            <a class="collapse-item" href="/dashboard-events">Overview</a>
            <a class="collapse-item" href="/events/event-list">Event list</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Actions</span>
        </a>
        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Actions for events:</h6>
            <a class="collapse-item" href="/events/new-event">New event</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
          <i class="fas fa-fw fa-file-invoice"></i>
          <span>Reports</span>
        </a>
        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">All event reports:</h6>
            <a class="collapse-item" href="/reports/optin">Opt In - per event</a>
          </div>
        </div>
      </li>

      <?php } ?>

      <?php if($user_loyalty == '1'){?>
       <!-- Divider -->
       <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Loyalty
</div>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
    <i class="fas fa-fw fa-cog"></i>
    <span>Settings</span>
  </a>
  <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Loyalty:</h6>
      <a class="collapse-item" href="/loyalty/loyalty-settings">Account information</a>
    </div>
  </div>
</li>

      <?php } ?>
<?php if($user_admin == '1') {?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Management
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-cog"></i>
          <span>Settings</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manager:</h6>
            <a class="collapse-item" href="/manager/users">User Information</a>
          </div>
        </div>
      </li>
<?php } ?>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "$user_firstname";?> <?php echo "$user_lastname"; ?></span>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="/user/profile">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <a class="dropdown-item" href="/user/settings">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->