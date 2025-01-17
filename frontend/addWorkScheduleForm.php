<?php
session_start();
require_once "../backend/staffCRUD.php";
// set staff id for button and also other info for text box
$todayDate = date("Y-m-d");

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  exit;
}

if(!isset($_SESSION["staff"])){
  header("Location: login.php");
  exit;
}

if(!$_SESSION["user"]->is_manager && !$_SESSION["user"]->is_admin){
  header("Location: staffHome.php");
  exit;
}

if(!isset($_POST["btnSubmit"])){
  header("Location: preAddWorkScheduleForm.php");
  exit;
}

$d = queryOneStaff($_POST["btnSubmit"])[0];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Aged Care Management System" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        
        <title>Add Work Schedule</title>
    </head>

    <body>

        <br>

        <div id="formPage">
          
            <h1 id="mainHeader">Add Work Schedule</h1>
            
            <div class="nice-form-group">
              <label>Staff ID:</label>
              <input type="text" disabled placeholder="" value="<?=$_POST["btnSubmit"]?>" style="--nf-input-size: 0.5rem">
            </div>

            <div class="nice-form-group">
              <label>Staff First Name:</label>
              <input type="text" disabled placeholder="" value="<?=$d->staff_first_name?>" style="--nf-input-size: 0.5rem"/>
            </div>

            <div class="nice-form-group">
              <label>Staff Last Name:</label>
              <input type="text" disabled placeholder="" value="<?=$d->staff_last_name?>" style="--nf-input-size: 0.5rem"/>
            </div>

            <form action="../backend/workScheduleValidation.php" method="post">

            <div class="nice-form-group">
                <label>Date Start (MM/DD/YYYY):</label>
                <input type="date" value="" style="--nf-input-size: 0.5rem" min="<?=$todayDate?>" name="dateStart">
            </div>

            <div class="nice-form-group">
                <label>Date End (MM/DD/YYYY):</label>
                <input type="date" value="" style="--nf-input-size: 0.5rem" min="<?=$todayDate?>" name="dateEnd">
            </div>

            <div id="centeringID" class="nice-form-group">
              <label>Time Start:</label>
              <input type="time" value="09:00" style="--nf-input-size: 0.5rem" name="timeStart">
              <br><br>
              <label>Time end:</label>
              <input type="time" value="17:00" style="--nf-input-size: 0.5rem" name="timeEnd">
            </div>

            <br>

            <div id="addMemberButton">
                <div>
                    <button id="addMember" type="submit" value="<?=$_POST["btnSubmit"]?>" name="btnSubmit">Add Work Schedule</button>
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

