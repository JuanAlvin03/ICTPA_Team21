<?php
include_once "../backend/memberCRUD.php";

$data = array();

$id = "";
$first = "";
$last = "";

if(isset($_POST["searchMember"])){
    if($_POST["searchMember"] != ""){
        $data = searchMembers($_POST["searchMember"]);
        $d = $data[0];
        $id = $d->member_id;
        $first = $d->member_first_name;
        $last = $d->member_last_name;
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
        
        
        <title>Schedule a Service</title>
    </head>

    <body>
        <div id="formPage">

            <br>
            <h1 id="mainHeader">Schedule a Service</h1>

            <form action="" method="post">
                <div class="nice-form-group">
                    <br>
                    <input type="search" placeholder="Search for Member" value="" style="--nf-input-size: 0.85rem" name="searchMember">
                </div>

                  <br>
                <div id="centreMemberButton">
                  <button type="submit" id="searchMemberButton" value="Search" name="btnSearch">Search</button>
                  <br>
                  <br><hr>
                </div>
            </form>

            <?

            ?>
            
            <!-- Go to next form -->
            <form action="addScheduledService.php" method="post">
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

                <!-- Service Location -->
                <fieldset class="nice-form-group">
                    <legend>Service Type</legend>
                    <div class="nice-form-group">
                      <input type="radio" name="serviceLoc" id="Male" value="1" checked>
                      <label for="Male">In-Home</label>
                    </div>

                    <div class="nice-form-group">
                      <input type="radio" name="serviceLoc" id="Female" value="2">
                      <label for="Female">Residential</label>
                    </div>
                </fieldset>

                <div id="addMemberButton">
                    <br>
                  <button id="btnAddMember" type="submit" name="btnNext" value="<?=$id?>">Next</button>
                  <br>
                  <br>
                </div>
            </form>
        </div>



        

    </body>
</html>       

