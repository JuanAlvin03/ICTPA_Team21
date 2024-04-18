<?php
    //cek login info
    session_start();
    
    include_once "../backend/memberContactCRUD.php";
    include_once "../backend/memberCRUD.php";

    // need to check if member id
    if(isset($_SESSION["temp"]) && isset($_SESSION["msg"])){

        $msg = $_SESSION["msg"];
        echo "<script>alert('$msg')</script>";
        $data = queryOneMember($_SESSION["temp"]);

        unset($_SESSION["temp"]);
        unset($_SESSION["msg"]);

    } else {
        // memberID not set
        header("Location: memberHome.php");
        exit;
    }

    $d=$data[0];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        <title>Add Member's Contact</title>
    </head>

    <body>

        <br>

        <div id="formPage">

            <h1 id="mainHeader">Add Member Contacts</h1>
            
            <div class="nice-form-group">
                <label>Member ID:</label>
                <input type="text" placeholder="" value="<?=$d->member_id?>" style="--nf-input-size: 0.5rem" disabled>
            </div><!-- setup up the MemberID from AWD Assignment -->

            <div class="nice-form-group">
                <label>Member First Name:</label>
                <input type="text" placeholder="" value="<?=$d->member_first_name?>" style="--nf-input-size: 0.5rem" disabled>
            </div>


            <div class="nice-form-group">
                <label>Member Last Name:</label>
                <input type="text" placeholder="" value="<?=$d->member_last_name?>" style="--nf-input-size: 0.5rem" disabled>
            </div>    
            
            <br>  
            <hr>

            <!-- FORM -->
            <form action="../backend/memberContactFormValidation.php" method="post">

                <div class="nice-form-group">
                    <label>Contact First Name:</label>
                    <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactFirstName">
                </div>


                <div class="nice-form-group">
                    <label>Contact Last Name:</label>
                    <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactLastName">
                </div>

                <div class="nice-form-group">
                    <label>Contact Address:</label>
                    <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactAddress">
                </div>               

                <div class="nice-form-group">
                    <label>Contact Mobile Telephone:</label>
                    <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactPhone">
                </div>               

                <div class="nice-form-group">
                    <label>Contact Email:</label>
                    <input type="email" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactEmail">
                </div>

                <div class="nice-form-group">
                    <label>Contact Relationship to Member:</label>
                    <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactRelationship">
                </div>     

                <br>

                <div id="addMemberContactsButton">
                <div>
                    <!-- set member id as button value-->
                    <button id="addMember" type="submit" value="<?=$d->member_id?>" name="btnAddContact">Add Contact</button>
                    <br>
                    <br>
                </div>
                </div>

            </form>
            
        </div>
        

    </body>
</html>       

