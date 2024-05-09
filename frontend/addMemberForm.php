<?php
    include_once "../backend/memberCRUD.php";

    //cek login info, if no info -> redirect to login

    $todayDate = date("Y-m-d");

    if(!isset($_POST["btnAdd"])){
        //redir to home
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        <title>Add Member</title>
    </head>

    <body>

        <br>

        <div id="formPage">

            <h1 id="mainHeader">New Member Form</h1>
            <!--
            <div class="nice-form-group">
                <label>Member ID:</label>
                <input type="text" disabled placeholder="" value="MID0001" style="--nf-input-size: 0.5rem"/>
              </div> setup up the MemberID from AWD Assignment -->
            
            <!-- FORM -->
            <form action="../backend/memberFormValidation.php" method="POST">

                <!-- FIRST NAME -->
                <div class="nice-form-group">
                    <label>First Name</label>
                    <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" id="memberFirstName" name="memberFirstName">
                </div>

                <!-- LAST NAME -->
                <div class="nice-form-group">
                    <label>Last Name</label>
                    <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" id="memberLastName" name="memberLastName">
                </div>

                <!-- DOB YYYY-MM-DD -->
                <div class="nice-form-group">
                    <label>Date of Birth (MM/DD/YYYY)</label>
                    <input type="date" value="" style="--nf-input-size: 0.5rem" id="memberDOB" max="<?=$todayDate?>" name="memberDOB">
                </div>

                <!-- GENDER -->
                <fieldset class="nice-form-group">
                    <legend>Gender</legend>
                    <div class="nice-form-group">
                      <input type="radio" name="memberGender" id="Male" value="Male" checked>
                      <label for="Male">Male</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="memberGender" id="Female" value="Female">
                      <label for="Female">Female</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="memberGender" id="Other" value="Other">
                      <label for="Other">Other</label>
                    </div>
                </fieldset>

                <!-- ADDRESS -->
                <div class="nice-form-group">
                    <label>Address</label>
                    <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" id="memberAddress" name="memberAddress">
                </div>         
                
                <!-- MEDICAL CONDITIONS -->
                <fieldset class="nice-form-group">
                    <legend>Medical Conditions</legend>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Coronary Artery Disease (CAD)" name="medicalConditions[]" value="Coronary Artery Disease (CAD)">
                        <label for="heartDisease">Coronary Artery Disease (CAD)</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="asthma" name="medicalConditions[]" value="Asthma">
                        <label for="asthma">Asthma</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="hypertension" name="medicalConditions[]" value="Hypertension">
                        <label for="hypertension">Hypertension</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="amnesia" name="medicalConditions[]" value="Amnesia">
                        <label for="amnesia">Amnesia</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Diabetes" name="medicalConditions[]" value="Diabetes">
                        <label for="Diabetes">Diabetes</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Osteoarthritis" name="medicalConditions[]" value="Osteoarthritis">
                        <label for="Osteoarthritis">Osteoarthritis</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Gastroesophageal Reflux Disease (GERD)" name="medicalConditions[]" value="Gastroesophageal Reflux Disease (GERD)">
                        <label for="Gastroesophageal Reflux Disease (GERD)">Gastroesophageal Reflux Disease (GERD)</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="text" id="otherCondition" name="medicalConditions[]" placeholder="Other Medical Condition" class="input-field" style="--nf-input-size: 0.5rem">
                    </div>
                </fieldset>

                <!-- Allergy -->
                <fieldset class="nice-form-group">
                    <legend>Allergies</legend>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Nuts" name="allergy[]" value="Nuts">
                        <label for="Nuts">Nuts</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Gluten" name="allergy[]" value="Gluten">
                        <label for="Gluten">Gluten</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Lactose Intolerant" name="allergy[]" value="Lactose Intolerant">
                        <label for="Lactose Intolerant">Lactose Intolerant</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Shellfish" name="allergy[]" value="Shellfish">
                        <label for="Shellfish">Shellfish</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Eggs" name="allergy[]" value="Eggs">
                        <label for="Eggs">Eggs</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Pollen" name="allergy[]" value="Pollen">
                        <label for="Pollen">Pollen</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Dust" name="allergy[]" value="Dust">
                        <label for="Dust">Dust</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="text" id="otherallergy" name="allergy[]" placeholder="Other Allergy" class="input-field" style="--nf-input-size: 0.5rem">
                    </div>
                </fieldset>

                <!-- ADDITIONAL INFORMATION -->
                <div class="nice-form-group">
                    <label>Additional Information</label>
                    <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" id="memberAddInfo" name="memberAddInfo">
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

                <!-- ADD BUTTON -->
                <div id="addMemberButton">
                  <button id="btnAddMember" type="submit" name="btnAddMember">Add Member</button>
                  <br>
                  <br>
                </div>
            </form>

            <!-- BACK BUTTON -->
            <form action="memberHome.php">
                <div id="addMemberButton">
                    <button type="submit">Back</button>
                    <br>
                    <br>
                </div>
            </form>   
    </body>
</html>       

