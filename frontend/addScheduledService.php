<?php

include_once "../backend/memberCRUD.php";
$todayDate = date("Y-m-d");
$data = array();
/*
if(isset($_POST["date"]) && isset($_POST["time"])){
    echo $_POST["date"];
    echo "<br>";
    echo $_POST["time"];
}
*/
$id = "";
$first = "";
$last = "";
$type = "";
$address = "";

if(isset($_POST["btnNext"])){
    if($_POST["btnNext"] != ""){
        $data = searchMembers($_POST["btnNext"]);
        $d = $data[0];
        $id = $d->member_id;
        $first = $d->member_first_name;
        $last = $d->member_last_name;
        $type = $_POST["serviceLoc"];
        $address = $d->member_address;
    }
}

$check = array("checked", "");

if($type == 2){$address="-"; $check = array("", "checked");};

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        
        <title>Schedule a Service</title>
    </head>

    <body>
        <div id="formPage">

            <br>
            <h1 id="mainHeader">Schedule a Service</h1>

            <div class="nice-form-group">
                <label>Member ID:</label>
                <input type="text" disabled placeholder="" value="<?=$id?>" style="--nf-input-size: 0.5rem"/>
              </div><!-- setup up the MemberID from AWD Assignment -->

            <div class="nice-form-group">
                <label>Member First Name:</label>
                <input type="text" disabled placeholder="First Name" value="<?=$first?>" style="--nf-input-size: 0.5rem"/>
            </div>


            <div class="nice-form-group">
                <label>Member Last Name:</label>
                <input type="text" disabled placeholder="Last Name" value="<?=$last?>" style="--nf-input-size: 0.5rem"/>
            </div>

            <!--
            <div class="nice-form-group">
                <label>Service Type:</label>
                <input type="text" disabled placeholder="Last Name" value="" style="--nf-input-size: 0.5rem"/>
            </div>-->

            <br>
            <hr>

            <br>
<!-- ../backend/scheduledServicesValidation.php -->
            <form action="../backend/scheduledServicesValidation.php" method="post">
            <label>Please select service options:</label>  
            <fieldset class="nice-form-group">
                <div class="nice-form-group">
                    <input type="checkbox" id="check-1" />
                    <label for="check-1" style="border:0px">Personal Care</label>
            </div>

            <div class="nice-form-group">
                <input type="checkbox" id="check-2" />
                <label for="check-2" style="border:0px">Companion Care</label>
            </div>

            <div class="nice-form-group">
                <input type="checkbox" id="check-3" />
                <label for="check-3" style="border:0px">Meal Preparation</label>
            </div>

            <div class="nice-form-group">
                <input type="checkbox" id="check-4" />
                <label for="check-4" style="border:0px">Medication Management</label>
            </div>

            <div class="nice-form-group">
                <input type="checkbox" id="check-5" />
                <label for="check-5" style="border:0px">Housekeeping</label>
            </div>

            <div class="nice-form-group">
                <input type="checkbox" id="check-6" />
                <label for="check-6" style="border:0px">Transportation</label>
            </div>

            <div class="nice-form-group">
                <input type="checkbox" id="check-7" />
                <label for="check-7" style="border:0px">Mobility Assistance</label>
            </div>

            <div class="nice-form-group">
                <input type="checkbox" id="check-8" />
                <label for="check-8" style="border:0px">Medical Care</label>
            </div>

            <div class="nice-form-group">
                <input type="checkbox" id="check-9" />
                <label for="check-9" style="border:0px">Cognitive Stimulation</label>
            </div>

            </fieldset>

            <br>
            <!--
            <div class="nice-form-group">
                <label>Assign Staff Member to Service:</label>
                <input type="search" placeholder="Search Staff Directory" value="" />
            </div>-->

            <!-- Service Location -->
            <fieldset class="nice-form-group">
                <legend>Service Type</legend>
                <div class="nice-form-group">
                  <input type="radio" name="serviceLoc" id="Male" value="1" <?=$check[0]?>>
                  <label for="Male">In-Home</label>
                </div>

                <div class="nice-form-group">
                  <input type="radio" name="serviceLoc" id="Female" value="2" <?=$check[1]?>>
                  <label for="Female">Residential</label>
                </div>
            </fieldset>

            <div class="nice-form-group">
                <label>Service Address:</label>
                <input type="text" placeholder="Last Name" value="<?=$address?>" style="--nf-input-size: 0.5rem" name="address">
            </div>

            <div class="nice-form-group">
                <label>Date</label>
                <input type="date" value="<?=$todayDate?>" min="<?=$todayDate?>" style="--nf-input-size: 0.5rem" name="date">
            </div>
            
            <div class="nice-form-group">
                <label>Time</label>
                <input type="time" value="00:00" style="--nf-input-size: 0.5rem" name="time">
            </div>

            
            <div class="nice-form-group">
                <label>Additional Information: </label>
                <textarea rows="5" value=""></textarea>
            </div>

            <br>
              <div id="addServiceButton">
                <button id="addMemberService" type="submit" value="<?=$id?>" name="btnSubmit">Schedule Service</button>
                <br>
              </div>
            </form>

           <br>
        </div>
    </body>
</html>       

