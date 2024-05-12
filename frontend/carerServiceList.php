<?php 
session_start();
include_once "../backend/scheduledServiceCRUD.php";
include_once "../backend/staffCRUD.php";

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  exit;
}

if(!isset($_SESSION["staff"])){
  header("Location: login.php");
  exit;
}

if(!isset($_POST["btnCarerID"])){
  header("Location: carerList.php");
  exit;
}

$data = queryStaffScheduledService($_POST["btnCarerID"]);
$carer = queryOneStaff($_POST["btnCarerID"])[0];

?>
<!DOCTYPE html>
<html>
<head>
<title>Carer's Service List</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Aged Care</a>
  <a href="scheduledServiceHome.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Scheduled Services</a>
  <a href="staffHome.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Staff Home Page</a>
  <a href="preAddScheduledService.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Schedule a Service</a>
  <a href="memberHome.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"></i>Member Management</a>
  
  <!--Log out must redirect to logout page to actually logout and stuff and then redirect to login page -->
  <a href="../backend/logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white">
    Logout
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Welcome, Staff!</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <h1 style="text-align: center">Carer's Service List</h1><br>
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <br>
         <h2 class="w3-center">Carer</h2>
         <h4 class="w3-center"><?=$carer->staff_first_name . ' ' .$carer->staff_last_name?></h4>
         <p class="w3-center"><img src="head.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <pre>Staff ID      : <?=$carer->staff_id?></pre>
         <pre>Position      : <?=$carer->position?></pre>
         <pre>Phone Number  : <?=$carer->staff_phone_number?></pre>
         <!-- 
         <p>
            <form action="detailStaffForm.php" method="post">
              <button type="submit" name="btn" value="<?//=$_SESSION["staff"]->staff_id?>" class="w3-button w3-block w3-theme-l4">View Profile</button>
            </form>
          </p>
-->
        </div>
      </div>   
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->


    <div class="w3-col m7">
    
    <!--
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h5>Search Member</h5>
              <form action="" method="get">
                <input type="text" name="searchMember" placeholder="Member ID/Name" class="w3-border w3-padding"><br><br>
                <button type="submit" class="w3-button w3-theme w3-border w3-padding">Search</button>
              </form>
            </div>
          </div>
        </div>
      </div>
-->

      <?php
            foreach ($data as $d) :
      ?>
        <div class="w3-container w3-card w3-white w3-round w3-margin">
          <h4>Scheduled Services ID: <?=$d->scheduled_service_id?></h4>
          <hr class="w3-clear">
          <h4>Member ID: <?=$d->member_id?> - <?=$d->member->member_first_name?> <?=$d->member->member_last_name?></h4>
          <h5><?=$d->service->service_type?></h5>
          <p>Address: <?=$d->service_location_address?></p>
          <p>Date: <?=substr($d->service_start_date_time, 0, 10)?></p>
          <p>Time: <?=substr($d->service_start_date_time, 11, 8)?></p>
          <p>Note: <?=$d->notes?></p>
          <p>Service Preparation Checklist: 
            <ol>
              <li>Preparation of Meals</li>
              <li>Preparation of Medication</li>
              <li>Preparation of Cleaning Materials</li>
            </ol>
          </p>
          <p>
            <form action="detailMemberForm.php" method="POST">
              <button type="submit" class="w3-button w3-theme w3-border w3-padding" value="<?= $d->member_id ?>" name="btnDetail">Member Profile</button>
            </form>
          </p>
        </div>
      <?php endforeach; ?>   
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->

    <div class="w3-col m2">
      <form action="carerList.php" method="POST">
        <button type="submit" class="w3-button w3-theme w3-border w3-padding" value="" name="btnDetail">Back</button>
      </form>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Aged care management system</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by Team 21</p>
</footer>
 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>