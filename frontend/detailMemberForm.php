<?php
    include_once "../backend/memberCRUD.php";

    $operation = "";

    $todayDate = date("Y-m-d");

    if(isset($_POST["btnDetail"])){
        //echo "Member's Detail" . "<br>";
        //queryOneMember($_GET["btnDetail"]);
        $operation = "Detail";
    }

    if(isset($_POST["btnUpdate"])){
        //echo "Update Member's Detail" . "<br>";
        //queryOneMember($_GET["btnUpdate"]);
        $operation = "Update";
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        
        <title>Member's Detail</title>
    </head>

    <body>

        <br>

        <div id="formPage">

            <h1 id="mainHeader">Member's Detail</h1>
            
            <div class="nice-form-group">
                <label>Member ID:</label>
                <input type="text" disabled placeholder="" value="MID0001" style="--nf-input-size: 0.5rem" disabled>
            </div> <!--setup up the MemberID from AWD Assignment -->

            <!-- FIRST NAME -->
            <div class="nice-form-group">
                <label>First Name</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" id="memberFirstName" name="memberFirstName" disabled>
            </div>

            <!-- LAST NAME -->
            <div class="nice-form-group">
                <label>Last Name</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" id="memberLastName" name="memberLastName" disabled>
            </div>

            <!-- DOB YYYY-MM-DD -->
            <div class="nice-form-group">
                <label>Date of Birth (MM/DD/YYYY)</label>
                <input type="date" value="" style="--nf-input-size: 0.5rem" id="memberDOB" max="<?=$todayDate?>" name="memberDOB" disabled>
            </div>

            <!-- GENDER -->
            <fieldset class="nice-form-group">
                <legend>Gender</legend>
                <div class="nice-form-group">
                  <input type="radio" name="memberGender" id="Male" value="Male" disabled>
                  <label for="Male">Male</label>
                </div>
                <div class="nice-form-group">
                  <input type="radio" name="memberGender" id="Female" value="Female" disabled>
                  <label for="Female">Female</label>
                </div>
                <div class="nice-form-group">
                  <input type="radio" name="memberGender" id="Other" value="Other" disabled>
                  <label for="Other">Other</label>
                </div>
            </fieldset>

            <!-- ADDRESS -->
            <div class="nice-form-group">
                <label>Address</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" id="memberAddress" name="memberAddress" disabled>
            </div>    

            <!-- ADDITIONAL INFORMATION -->
            <div class="nice-form-group">
                <label>Additional Information</label>
                <textarea rows="5" value="" id="memberAddInfo" name="memberAddInfo" disabled></textarea>
            </div>

            <!--
            <fieldset class="nice-form-group">
                <label>Member Status</label>
                <div class="nice-form-group">
                  <input type="radio" name="radio" id="r-1" />
                  <label for="r-1">Active</label>
                </div>
                <div class="nice-form-group">
                    <input type="radio" name="radio" id="r-2" />
                    <label for="r-2">Disabled</label>
                  </div>              
              </fieldset>
            -->

            <br>

            <!-- BACK BUTTON -->
            <div id="addMemberButton">
              <button>Back</button>
              <br>
              <br>
            </div>

    </body>
</html>       

