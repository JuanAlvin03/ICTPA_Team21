<?php
    include_once "../backend/memberCRUD.php";

    // if no user login info, redirrect/throw to login

    $todayDate = date("Y-m-d");
    $data = array();

    if(isset($_POST["btnDetail"])){
        $data = queryOneMember($_POST["btnDetail"]);
        //echo "Update Member's Detail" . "<br>";
        //queryOneMember($_GET["btnUpdate"]);
        //$operation = "Update";
    } else {
        // btndetail not set
        // redirect to member home
    }

    // if $data empty, 
    // or if $data is error msg,
    // message = data not found, 
    // redirect to memberHome with msg (append to header/link), at memberHome, alert (using js) the msg, then redirect to memberHome with no msg

    $d = $data[0];

    $arrGenderChecker = array("", "", "");

    if($d->member_gender === "Male"){
        $arrGenderChecker = array("checked", "", "");
    } else if ($d->member_gender === "Female"){
        $arrGenderChecker = array("", "checked", "");
    } else if ($d->member_gender === "Other") {
        $arrGenderChecker = array("", "", "checked");
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
                <input type="text" placeholder="" value="<?= $d->member_id ?>" style="--nf-input-size: 0.5rem" disabled>
            </div> <!--setup up the MemberID from AWD Assignment -->

            <!-- FIRST NAME -->
            <div class="nice-form-group">
                <label>First Name</label>
                <input type="text" placeholder="" value="<?= $d->member_first_name ?>" style="--nf-input-size: 0.5rem" id="memberFirstName" name="memberFirstName" disabled>
            </div>

            <!-- LAST NAME -->
            <div class="nice-form-group">
                <label>Last Name</label>
                <input type="text" placeholder="" value="<?= $d->member_last_name ?>" style="--nf-input-size: 0.5rem" id="memberLastName" name="memberLastName" disabled>
            </div>

            <!-- DOB YYYY-MM-DD -->
            <div class="nice-form-group">
                <label>Date of Birth (MM/DD/YYYY)</label>
                <input type="date" value="<?= $d->member_dob ?>" style="--nf-input-size: 0.5rem" id="memberDOB" max="<?=$todayDate?>" name="memberDOB" disabled>
            </div>

            <!-- GENDER -->
            <fieldset class="nice-form-group">
                <legend>Gender</legend>

                <div class="nice-form-group">
                  <input type="radio" name="memberGender" id="Male" value="Male" disabled <?=$arrGenderChecker[0]?>>
                  <label for="Male">Male</label>
                </div>

                <div class="nice-form-group">
                  <input type="radio" name="memberGender" id="Female" value="Female" disabled <?=$arrGenderChecker[1]?>>
                  <label for="Female">Female</label>
                </div>

                <div class="nice-form-group">
                  <input type="radio" name="memberGender" id="Other" value="Other" disabled <?=$arrGenderChecker[2]?>>
                  <label for="Other">Other</label>
                </div>

            </fieldset>

            <!-- ADDRESS -->
            <div class="nice-form-group">
                <label>Address</label>
                <input type="text" placeholder="" value="<?= $d->member_address ?>" style="--nf-input-size: 0.5rem" id="memberAddress" name="memberAddress" disabled>
            </div>

            <!-- ADDITIONAL INFORMATION -->
            <div class="nice-form-group">
                <label>Additional Information</label>
                <!-- set value to additional notes -->
                <textarea rows="5" value="<?= $d->additional_notes ?>" id="memberAddInfo" name="memberAddInfo" disabled></textarea>
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
                <form action="memberHome.php">
                    <button type="submit">Back</button>
                    <br>
                    <br>
                </form>      
            </div>
    </body>
</html>       

