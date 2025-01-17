<?php
    include_once "../backend/memberCRUD.php";

    // if no user login info, redirrect/throw to login

    $todayDate = date("Y-m-d");
    $data = array();

    if(isset($_POST["btnUpdate"])){
        $data = queryOneMember($_POST["btnUpdate"]);
    } else {
        // btnUpdate not set
        header("Location: memberHome.php");
        exit;
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

    $medcon = ["Coronary Artery Disease (CAD)", "Asthma", "Hypertension", "Amnesia", "Diabetes", "Osteoarthritis", "Gastroesophageal Reflux Disease (GERD)"];
    $allerg = ["Nuts", "Gluten", "Lactose Intolerant", "Shellfish", "Eggs", "Pollen", "Dust"];

    $temp1 = explode(";", $d->sickness);
    $temp2 = explode(";", $d->allergy);

    $temp11 = $temp1;
    $temp22 = $temp2;
    
    $marr = [];
    $aarr = [];

    foreach($medcon as $m){
        $flag = 0;
        foreach($temp1 as $t){

            if($m === $t){
                $flag = 1;
                array_shift($temp11);
                break;
            }
        }

        if($flag === 1){
            $marr[] = "checked";
        } else {
            $marr[] = "";
        }
    }

    foreach($allerg as $a){
        $flag = 0;
        foreach($temp2 as $t){

            if($a === $t){
                $flag = 1;
                array_shift($temp22);
                break;
            }
            
        }
        if($flag === 1){
            $aarr[] = "checked";
        } else {
            $aarr[] = "";
        }
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

            <h1 id="mainHeader">Update Member Detail</h1>

            <div class="nice-form-group">
                <form action="updateContactForm.php" method="post">
                    <button type="submit" value="<?= $d->member_id ?>" name="memberID">Update Contact's Detail</button>
                </form>
            </div>

            <!-- FORM -->
            <form action="../backend/memberFormValidation.php" method="post">
                <!-- MEMBER ID Must Be Disabled-->
                <div class="nice-form-group">
                    <label>Member ID:</label>
                    <input type="text" placeholder="" value="<?= $d->member_id ?>" style="--nf-input-size: 0.5rem" id="memberID" name="memberID" disabled>
                </div> <!--setup up the MemberID from AWD Assignment -->

                <!-- FIRST NAME -->
                <div class="nice-form-group">
                    <label>First Name</label>
                    <input type="text" placeholder="" value="<?= $d->member_first_name ?>" style="--nf-input-size: 0.5rem" id="memberFirstName" name="memberFirstName">
                </div>

                <!-- LAST NAME -->
                <div class="nice-form-group">
                    <label>Last Name</label>
                    <input type="text" placeholder="" value="<?= $d->member_last_name ?>" style="--nf-input-size: 0.5rem" id="memberLastName" name="memberLastName">
                </div>

                <!-- DOB YYYY-MM-DD -->
                <div class="nice-form-group">
                    <label>Date of Birth (MM/DD/YYYY)</label>
                    <input type="date" value="<?= $d->member_dob ?>" style="--nf-input-size: 0.5rem" id="memberDOB" max="<?=$todayDate?>" name="memberDOB">
                </div>

                <!-- GENDER -->
                <fieldset class="nice-form-group">
                    <legend>Gender</legend>

                    <div class="nice-form-group">
                      <input type="radio" name="memberGender" id="Male" value="Male" <?=$arrGenderChecker[0]?>>
                      <label for="Male">Male</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="memberGender" id="Female" value="Female" <?=$arrGenderChecker[1]?>>
                      <label for="Female">Female</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="memberGender" id="Other" value="Other" <?=$arrGenderChecker[2]?>>
                      <label for="Other">Other</label>
                    </div>

                </fieldset>

                <!-- ADDRESS -->
                <div class="nice-form-group">
                    <label>Address</label>
                    <input type="text" placeholder="" value="<?= $d->member_address ?>" style="--nf-input-size: 0.5rem" id="memberAddress" name="memberAddress">
                </div>

                <!-- MEDICAL CONDITIONS -->
                <fieldset class="nice-form-group">
                    <legend>Medical Conditions</legend>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Coronary Artery Disease (CAD)" name="medicalConditions[]" value="Coronary Artery Disease (CAD)" <?=$marr[0]?>>
                        <label for="heartDisease">Coronary Artery Disease (CAD)</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="asthma" name="medicalConditions[]" value="Asthma" <?=$marr[1]?>>
                        <label for="asthma">Asthma</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="hypertension" name="medicalConditions[]" value="Hypertension" <?=$marr[2]?>>
                        <label for="hypertension">Hypertension</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="amnesia" name="medicalConditions[]" value="Amnesia" <?=$marr[3]?>>
                        <label for="amnesia">Amnesia</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Diabetes" name="medicalConditions[]" value="Diabetes" <?=$marr[4]?>>
                        <label for="Diabetes">Diabetes</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Osteoarthritis" name="medicalConditions[]" value="Osteoarthritis" <?=$marr[5]?>>
                        <label for="Osteoarthritis">Osteoarthritis</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Gastroesophageal Reflux Disease (GERD)" name="medicalConditions[]" value="Gastroesophageal Reflux Disease (GERD)" <?=$marr[6]?>>
                        <label for="Gastroesophageal Reflux Disease (GERD)">Gastroesophageal Reflux Disease (GERD)</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="text" id="otherCondition" name="medicalConditions[]" placeholder="Other Medical Condition" class="input-field" style="--nf-input-size: 0.5rem" value="<?=$temp11[0]?>">
                    </div>
                </fieldset>

                <!-- Allergy -->
                <fieldset class="nice-form-group">
                    <legend>Allergies</legend>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Nuts" name="allergy[]" value="Nuts" <?=$aarr[0]?>>
                        <label for="Nuts">Nuts</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Gluten" name="allergy[]" value="Gluten" <?=$aarr[1]?>>
                        <label for="Gluten">Gluten</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Lactose Intolerant" name="allergy[]" value="Lactose Intolerant" <?=$aarr[2]?>> 
                        <label for="Lactose Intolerant">Lactose Intolerant</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Shellfish" name="allergy[]" value="Shellfish" <?=$aarr[3]?>>
                        <label for="Shellfish">Shellfish</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Eggs" name="allergy[]" value="Eggs" <?=$aarr[4]?>>
                        <label for="Eggs">Eggs</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Pollen" name="allergy[]" value="Pollen" <?=$aarr[5]?>>
                        <label for="Pollen">Pollen</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="checkbox" id="Dust" name="allergy[]" value="Dust" <?=$aarr[6]?>>
                        <label for="Dust">Dust</label>
                    </div>
                    <div class="nice-form-group">
                        <input type="text" id="otherallergy" name="allergy[]" placeholder="Other Allergy" class="input-field" style="--nf-input-size: 0.5rem" value="<?=$temp22[0]?>">
                    </div>
                </fieldset>

                <!-- ADDITIONAL INFORMATION -->
                <div class="nice-form-group">
                    <label>Additional Information</label>
                    <input type="text" placeholder="" value="<?= $d->additional_notes ?>" style="--nf-input-size: 0.5rem" id="memberAddInfo" name="memberAddInfo">
                </div>

                <br>

                <!-- UPDATE BUTTON -->
                <div id="addMemberButton">
                    <button type="submit" name="btnUpdateMember" value="<?= $d->member_id ?>">Update</button>
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

