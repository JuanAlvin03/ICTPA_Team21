<?php

session_start();
require_once "../backend/staffCRUD.php";

$todayDate = date("Y-m-d");

if(!isset($_SESSION["user"])){
  header("Location: login.php");
  exit;
}

if(!isset($_SESSION["staff"])){
  header("Location: login.php");
  exit;
}

if(!isset($_POST["btn"])){
    header("Location: staffHome.php");
    exit;
  }

$d = queryOneStaff($_POST["btn"])[0];

$arrGenderChecker = array("", "", "");
if($d->staff_gender === "Male"){
    $arrGenderChecker = array("checked", "", "");
} else if ($d->staff_gender === "Female"){
    $arrGenderChecker = array("", "checked", "");
} else if ($d->staff_gender === "Other") {
    $arrGenderChecker = array("", "", "checked");
}

$emptype = array("", "", "");
if($d->staff_employment_type === "Full Time"){
    $emptype = array("checked", "", "");
} else if ($d->staff_employment_type === "Part Time"){
    $emptype = array("", "checked", "");
} else if ($d->staff_employment_type === "Casual") {
    $emptype = array("", "", "checked");
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
        
        <title>Staff Details</title>
    </head>

    <body>

        <br>

        <div id="formPage">


            <h1 id="mainHeader">Staff Details</h1>

            <div class="nice-form-group">
                <label>Staff ID:</label>
                <input type="text" placeholder="" value="<?=$d->staff_id?>" style="--nf-input-size: 0.5rem" name="firstName" disabled>
            </div>
            
            <div class="nice-form-group">
                <label>First Name:</label>
                <input type="text" placeholder="" value="<?=$d->staff_first_name?>" style="--nf-input-size: 0.5rem" name="firstName" disabled>
            </div>


            <div class="nice-form-group">
                <label>Last Name:</label>
                <input type="text" placeholder="" value="<?=$d->staff_last_name?>" style="--nf-input-size: 0.5rem" name="lastName" disabled>
            </div>

            <div class="nice-form-group">
                <label>Date of Birth (MM/DD/YYYY):</label>
                <input type="date" value="<?=$d->staff_dob?>" style="--nf-input-size: 0.5rem" max="<?=$todayDate?>" name="dob" disabled>
            </div>

            <div class="nice-form-group">
                <label>Address:</label>
                <input type="text" placeholder="" value="<?=$d->staff_address?>" style="--nf-input-size: 0.5rem" name="address" disabled>
            </div>   

            <div class="nice-form-group">
              <label>Mobile Phone Number:</label>
              <input type="tel" placeholder="" value="<?=$d->staff_phone_number?>" style="--nf-input-size: 0.5rem" name="phone" disabled>
            </div>

            <div class="nice-form-group">
              <label>Email:</label>
              <input type="email" placeholder="" value="<?=$d->staff_email?>" style="--nf-input-size: 0.5rem" name="email" disabled>
            </div>

              <fieldset class="nice-form-group">
                <legend>Gender:</legend>
                <div class="nice-form-group">
                  <input type="radio" name="gender" id="male" value="Male" disabled <?=$arrGenderChecker[0]?>>
                  <label for="male">Male</label>
                </div>
              
                <div class="nice-form-group">
                  <input type="radio" name="gender" id="female" value="Female" disabled <?=$arrGenderChecker[1]?>>
                  <label for="female">Female</label>
                </div>
              
                <div class="nice-form-group">
                  <input type="radio" name="gender" id="other" value="Other" disabled <?=$arrGenderChecker[2]?>>
                  <label for="other">Other</label>
                </div>
              </fieldset>

              <div class="nice-form-group">
                <label>Position Title:</label>
                <input type="text" placeholder="" value="<?=$d->position?>" style="--nf-input-size: 0.5rem" name="position" disabled>
              </div>
         
              <fieldset class="nice-form-group">
                <label>Staff Employment Type:</label>
                <div class="nice-form-group">
                  <input type="radio" name="employmentType" id="r-1" value="Full Time" disabled <?=$emptype[0]?>>
                  <label for="full">Full Time</label>
                </div>
               
                <div class="nice-form-group">
                    <input type="radio" name="employmentType" id="r-2" value="Part Time" disabled <?=$emptype[1]?>>
                    <label for="part">Part Time</label>
                </div>
                
                <div class="nice-form-group">
                    <input type="radio" name="employmentType" id="r-3" value="Casual" disabled <?=$emptype[2]?>>
                    <label for="casual">Casual</label>
                </div>  

              </fieldset>

              <div class="nice-form-group">
                <label>Manager ID:</label>
                <input type="text" placeholder="" value="<?=$d->manager_id?>" style="--nf-input-size: 0.5rem" name="managerID" disabled>
              </div>

            <br>

            <!-- Back Button -->
            <div id="addMemberButton">
              <form action="staffHome.php">
                <button type="submit">Back</button>
              </form>
            </div>
            
    </body>
</html>       

