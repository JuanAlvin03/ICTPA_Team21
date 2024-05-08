<?php
include_once "../backend/memberCRUD.php";
session_start();
//cek login info, if no info -> redirect to login

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  exit;
}

if(!isset($_SESSION["staff"])){
  header("Location: login.php");
  exit;
}

$data = array();

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
  <a href="scheduledServiceHome.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-user w3-margin-right"></i>Scheduled Services Home</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One task to complete</a>
      <a href="#" class="w3-bar-item w3-button">You got an email</a>
      <a href="#" class="w3-bar-item w3-button">Update your profile</a>
    </div>
  </div>
  <a href="preAddScheduledService.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Schedule a Service</a>
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
  <h1 style="text-align: center">Member Management</h1><br>
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
      <div class="w3-card w3-white w3-round w3-margin">
        <form action="addMemberForm.php">
          <button type="submit" style="width: 100%;" class="w3-button w3-theme w3-border w3-padding" name="btnAdd">Add New Member</button>
        </form>
      </div>

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

      <?php
        if((count($data) == 0) && isset($_GET["searchMember"])): 
      ?>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h4>No such member</h4>
      </div>  
            
      <?php endif;
        if(!isset($_GET["searchMember"])) : 
      ?>

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h4>Search a member!</h4>
      </div>  

      <?php endif;
            foreach ($data as $d) :
      ?>
        <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="head.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <h4><?=$d->member_first_name?> <?=$d->member_last_name?></h4><br>
        <hr class="w3-clear">
        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>DOB : <?=$d->member_dob?></p>
        <p>Member ID : <?=$d->member_id?></p>
        <p>
          <form action="detailMemberForm.php" method="POST">
            <button type="submit" class="w3-button w3-theme w3-border w3-padding" value="<?= $d->member_id ?>" name="btnDetail">See Details</button>
          </form>
          <form action="updateMemberForm.php" method="POST">
            <button type="submit" class="w3-button w3-theme w3-border w3-padding" value="<?= $d->member_id ?>" name="btnUpdate">Update Details</button>
          </form>
        </p>
        </div>  
      <?php endforeach; ?>   
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