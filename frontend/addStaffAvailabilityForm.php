<?php

session_start();

if(!isset($_SESSION["newStaffID"])){
  header("Location: staffHome.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Aged Care Management System" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        <title>Staff Availability Schedule</title>
    </head>

    <body>

        <br>

        <div id="formPage">
          
            <h1 id="mainHeader">Set Availability</h1>
            
            <div class="nice-form-group">
              <label>Staff ID:</label>
              <input type="text" disabled placeholder="" value="<?=$_SESSION["newStaffID"]?>" style="--nf-input-size: 0.5rem"/>
            </div>
<!--
            <div class="nice-form-group">
              <label>Staff First Name:</label>
              <input type="text" disabled placeholder="" value="" style="--nf-input-size: 0.5rem"/>
            </div>

            <div class="nice-form-group">
              <label>Staff Last Name:</label>
              <input type="text" disabled placeholder="" value="" style="--nf-input-size: 0.5rem"/>
            </div>
-->
            <form action="../backend/staffAvailabilityValidation.php" method="post">

            <div id="centeringID" class="nice-form-group">
              <label>Monday:</label>
              <input type="time" value="09:00" style="--nf-input-size: 0.5rem" name="mons"> to
              <input type="time" value="17:00" style="--nf-input-size: 0.5rem" name="mone">
            </div>

            <div id="centeringID" class="nice-form-group">
              <label>Tuesday:</label>
              <input type="time" value="09:00" style="--nf-input-size: 0.5rem" name="tues"> to
              <input type="time" value="17:00" style="--nf-input-size: 0.5rem" name="tuee">
            </div>

            <div id="centeringID" class="nice-form-group">
              <label>Wednesday:</label>
              <input type="time" value="09:00" style="--nf-input-size: 0.5rem" name="weds"> to
              <input type="time" value="17:00" style="--nf-input-size: 0.5rem" name="wede">
            </div>

            <div id="centeringID" class="nice-form-group">
              <label>Thursday:</label>
              <input type="time" value="09:00" style="--nf-input-size: 0.5rem" name="thus"> to
              <input type="time" value="17:00" style="--nf-input-size: 0.5rem" name="thue">
            </div>

            <div id="centeringID" class="nice-form-group">
              <label>Friday:</label>
              <input type="time" value="09:00" style="--nf-input-size: 0.5rem" name="fris"> to
              <input type="time" value="17:00" style="--nf-input-size: 0.5rem" name="frie">
            </div>

            <div id="centeringID" class="nice-form-group">
              <label>Saturday:</label>
              <input type="time" value="09:00" style="--nf-input-size: 0.5rem" name="sats"> to
              <input type="time" value="17:00" style="--nf-input-size: 0.5rem" name="sate">
            </div>

            <div id="centeringID" class="nice-form-group">
              <label>Sunday:</label>
              <input type="time" value="09:00" style="--nf-input-size: 0.5rem" name="suns"> to
              <input type="time" value="17:00" style="--nf-input-size: 0.5rem" name="sune">
            </div>

            <br>

            <div id="addMemberButton">
                <div>
                    <button id="addMember" type="submit" value="<?=$_SESSION["newStaffID"]?>" name="btnSubmit">Set Availability</button>
                    <br>
                    <br>
                </div>
            </div>

            </form>

            <!-- Back Button -->
            <div id="addMemberButton">
              <form action="staffHome.php">
                <button type="submit">Back</button>
              </form>
            </div>

    </body>
</html>       

