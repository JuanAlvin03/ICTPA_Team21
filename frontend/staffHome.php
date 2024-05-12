<?php
session_start();

require_once "../backend/staffAvailabilityCRUD.php";
require_once "../backend/workScheduleCRUD.php";

// CHECK LOGIN INFO
if(!isset($_SESSION["user"])){
    header("Location: login.php");
    exit;
}

if(!isset($_SESSION["staff"])){
    header("Location: login.php");
    exit;
}

// GET AVAILABILITY TO DISPLAY
$ava = queryOneAvailability($_SESSION["staff"]->staff_id)[0];

// GET WORK SCHEDULES
$schedule = queryUpcomingStaffWork($_SESSION["staff"]->staff_id)[0];

?>

<!DOCTYPE html>
<html>
<head>
<title>Staff Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html, body, h1, h2, h3, h4, h5{font-family: "Open Sans", sans-serif}
</style>
</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Aged Care</a>
  <a href="memberHome.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Member Management</a>
  <a href="addStaffForm.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Add New Staff</a>
  <a href="preAddWorkScheduleForm.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Schedule a Shift</a>
  <a href="carerList.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Carers List</a>
  <a href="../backend/logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    Logout
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <br>
         <h4 class="w3-center"><?=$_SESSION["staff"]->staff_first_name . ' ' .$_SESSION["staff"]->staff_last_name?></h4>
         <p class="w3-center"><img src="head.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <pre>Staff ID      : <?=$_SESSION["staff"]->staff_id?></pre>
         <pre>Position      : <?=$_SESSION["staff"]->position?></pre>
         <pre>Phone Number  : <?=$_SESSION["staff"]->staff_phone_number?></pre>
          <p>
            <form action="detailStaffForm.php" method="post">
              <button type="submit" name="btn" value="<?=$_SESSION["staff"]->staff_id?>" class="w3-button w3-block w3-theme-l4">View Profile</button>
            </form>
          </p>
        </div>
      </div>
      <br>
        <div class="w3-card w3-round w3-white">
          <div class="w3-container">
            <p><strong>Things to do:</strong></p>
            <p><input type="checkbox" id="ttd1" name="todolist" value="">  To Do List 1</p>
            <p><input type="checkbox" id="ttd2" name="todolist" value="">  To Do List 2</p>
            <p><input type="checkbox" id="ttd3" name="todolist" value="">  To Do List 3</p>
            <p><input type="checkbox" id="ttd3" name="todolist" value="">  To Do List 4</p>
            <p><button class="w3-button w3-block w3-theme-l4">Add New Note</button></p>
          </div>
        </div>

      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Member Directory Shortcuts</p>
          <p>
            <span class="w3-tag w3-small w3-theme"><a href="memberHome.php" class="w3-hover-white">Member Management</a></span>
            <span class="w3-tag w3-small w3-theme-d2">Medication Requirements</span>
            <span class="w3-tag w3-small w3-theme">Add Member</span>
          </p>
        </div>
      </div>
      <br>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <p><h4 class="w3-center">Welcome <?=$_SESSION["staff"]->staff_first_name?></h4></p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Upcoming work schedule-->
      <div class="w3-container w3-card w3-white w3-round w3-margin">
        <h4>Upcoming Work Schedule</h4>
        <h6>Shift Start: <?=substr($schedule->start, 0, 10)?> <?=substr($schedule->start, 11, 8)?></h6>
        <h6>Shift End  : <?=substr($schedule->end, 0, 10)?> <?=substr($schedule->end, 11, 8)?></h6>
        
        <p><button class="w3-button w3-block w3-theme-l4">Check-In</button></p>
      </div>

      <!-- Change Availability-->
      <div class="w3-container w3-card w3-white w3-round w3-margin">
        <h4>Work Availability</h4>
        <pre>Mon  : <?= $ava->mon_start .' - '. $ava->mon_end?></pre>
        <pre>Tue  : <?= $ava->tue_start .' - '. $ava->tue_end?></pre>
        <pre>Wed  : <?= $ava->wed_start .' - '. $ava->wed_end?></pre>
        <pre>Thu  : <?= $ava->thu_start .' - '. $ava->thu_end?></pre>
        <pre>Fri  : <?= $ava->fri_start .' - '. $ava->fri_end?></pre>
        <pre>Sat  : <?= $ava->sat_start .' - '. $ava->sat_end?></pre>
        <pre>Sun  : <?= $ava->sun_start .' - '. $ava->sun_end?></pre>
        <p>
            <form action="updateStaffAvailabilityForm.php" method="post">
                <button class="w3-button w3-block w3-theme-l4" type="submit" name="btnChange" value="<?=$_SESSION["staff"]->staff_id?>">Change Work Availability</button>
            </form>
        </p>
      </div>

      <!--
      
      <div class="w3-container w3-card w3-white w3-round w3-margin">
        <span class="w3-right w3-opacity">13/04/2024 9am</span>
        <h4>Jane Doe: MemberID: MID019</h4>
        <p></p>
        <p>Address: 7 Finder Avenue, Malvern VIC 3162 </p>
        <p>Visitation Preparation Checklist: 

            <ol>
                <li>Preparation of Meals</li>
                <li>Preparation of Medication</li>
                <li>Preparation of Cleaning Materials</li>
             </ol>

             <p><a href="">Member Visitation Profile: Jane Doe 13/04/2024 @ 9am</a></p>

        </p>
      </div>  

      <div class="w3-container w3-card w3-white w3-round w3-margin">
        <span class="w3-right w3-opacity">14/04/2024 9:30am</span>
        <h4>Ahn Do: MemberID: MID10026</h4>
        <p></p>
        <p>Address: 10 States Drive, Sandringham VIC 3122 </p>
        <p>Visitation Preparation Checklist: 

            <ol>
                <li>Preparation of Meals</li>
                <li>Preparation of Medication</li>
                <li>Preparation of Cleaning Materials</li>
             </ol>

             <p><a href="">Member Visitation Profile: Ahn Do 14/04/2024 @ 9:30am</a></p>

        </p>
      </div> 
-->
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friday 10th May 2024</p>

        </div>
      </div>

      <BR>

      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><strong>Important Dates</strong></p>

        </div>
      </div>
      <BR>
      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><strong>Sausage Sizzle</strong></p>
          <p>Saturday 13:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>

      <br>


      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p><strong>Staff Meeting</strong></p>
          <p>Monday 10:00am</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
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
