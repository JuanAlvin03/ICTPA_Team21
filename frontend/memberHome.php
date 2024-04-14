<?php
include_once "../backend/memberCRUD.php";

if(isset($_GET["searchMember"])){
    if($_GET["searchMember"] != ""){
        $data = searchMembers($_GET["searchMember"]);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Member Management</title>
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
  <a href="scheduledServiceHome.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-user w3-margin-right"></i>Schedule a Service</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One task to complete</a>
      <a href="#" class="w3-bar-item w3-button">You got an email</a>
      <a href="#" class="w3-bar-item w3-button">Update your profile</a>
    </div>
  </div>
  <a href="Login.html" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
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
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Welcome, Staff!</h4>
         <p class="w3-center"><img src="head.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> work position</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> <address></address></p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> DOB </p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Task</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Member List</button>
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
      
      <!-- member directory --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Member Directory</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">Elderly care plans</span>
            <span class="w3-tag w3-small w3-theme-d4">Member records</span>
            <span class="w3-tag w3-small w3-theme-d3">Personal details</span>
            <span class="w3-tag w3-small w3-theme-d2">Medication requirement</span>
            <span class="w3-tag w3-small w3-theme-d1">Relevant information</span>
            <span class="w3-tag w3-small w3-theme">Add member</span>

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
              <h5>Search Member</h5>
              <form action="" method="get">
                <input type="text" name="searchMember" placeholder="Member ID/Name" class="w3-border w3-padding"><br><br>
                <button type="submit" class="w3-button w3-theme w3-border w3-padding">Search</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="head.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">16 min</span>
        <h4>Member 1</h4><br>
        <hr class="w3-clear">
        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> details</p>
        <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> address</p>
        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> DOB </p>
      </div>  

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="head.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">32 min</span>
        <h4>Member 2</h4><br>
        <hr class="w3-clear">
        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> details</p>
        <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> address</p>
        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> DOB </p>
        <p></p>
      </div> 


      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Staff directory:</p>
          <p class="w3-center"><img src="head.jpg" class="w3-circle" style="height:106px;width:106px" alt="Profile"></p>
          <p><strong>Alice.P</strong></p>
          <p class="w3-center"><img src="head.jpg" class="w3-circle" style="height:106px;width:106px" alt="Profile"></p>
          <p><strong>John.D</strong></p>
          <p class="w3-center"><img src="head.jpg" class="w3-circle" style="height:106px;width:106px" alt="Profile"></p>
          <p><strong>Mary.L</strong></p>
          <p class="w3-center"><img src="head.jpg" class="w3-circle" style="height:106px;width:106px" alt="Profile"></p>
          <p><strong>David.S</strong></p>

        </div>
      </div>
      <br>
      

      

      
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
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Team 21</a></p>
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
