<?php

include_once "../backend/memberCRUD.php";
include_once "../backend/serviceCRUD.php";

$todayDate = date("Y-m-d");
$data = array();

if(isset($_POST["btnNext"])){
    if($_POST["btnNext"] != ""){
        $data = searchMembers($_POST["btnNext"]);
        $d = $data[0];
        $id = $d->member_id;
        $first = $d->member_first_name;
        $last = $d->member_last_name;
        $address = $d->member_address;
    }
} else {
    header("Location: preAddScheduledService.php");
    exit;
}

$listService = queryService();

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
              </div>

            <div class="nice-form-group">
                <label>Member First Name:</label>
                <input type="text" disabled placeholder="First Name" value="<?=$first?>" style="--nf-input-size: 0.5rem"/>
            </div>


            <div class="nice-form-group">
                <label>Member Last Name:</label>
                <input type="text" disabled placeholder="Last Name" value="<?=$last?>" style="--nf-input-size: 0.5rem"/>
            </div>

            <br>

            <br>

            <form action="../backend/scheduledServicesValidation.php" method="post">

                <label>Please select service option:</label>  

                <fieldset class="nice-form-group">

                <?php 
                  foreach ($listService as $d) :
                ?>
                  <div class="nice-form-group">
                    <input type="radio" name="serviceID" value="<?=$d->service_id?>" checked>
                    <label><?=$d->service_type?></label>
                  </div>  

                <?php endforeach; ?>   

                </fieldset>
                <!--
<fieldset class="nice-form-group">
                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="1" checked>
                      <label for="male">Personal Care Services</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="2">
                      <label for="female">Healthcare Service</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="3">
                      <label for="other">Nutritional Service</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="4">
                      <label for="other">Therapeutic Service</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="5">
                      <label for="other">Emotional and Psychological Support</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="6">
                      <label for="other">Safety and Security Services</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="7">
                      <label for="other">Transportation Services</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="9">
                      <label for="other">Housekeeping and Laundry Services</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="10">
                      <label for="other">Cultural and Spiritual support</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="11">
                      <label for="other">Family Support Service</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceID" value="12">
                      <label for="other">End-of-Life Care Services</label>
                    </div>

                </fieldset>-->

                <br>

                <div class="nice-form-group">
                    <label>Service Address:</label>
                    <input type="text" placeholder="service address" value="<?=$address?>" style="--nf-input-size: 0.5rem" name="address">
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

            <!-- Back Button -->
            <div id="addMemberButton">
            <br>
              <form action="preAddScheduledService.php">
                <button type="submit">Back</button>
              </form>
            </div>

           <br>
        </div>
    </body>
</html>       

