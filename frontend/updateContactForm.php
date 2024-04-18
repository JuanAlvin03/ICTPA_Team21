<?php
    include_once "../backend/memberContactCRUD.php";
    include_once "../backend/memberCRUD.php";
    //cek login info

    if(isset($_POST["memberID"])){
        $data = queryMemberContact($_POST["memberID"]);
        $data2 = queryOneMember($_POST["memberID"]);
    } else {
        // memberID not set
        header("Location: memberHome.php");
        exit;
    }

    // if $data empty, 
    // or if $data is error msg,
    // message = data not found, 
    // redirect to memberHome with msg (append to header/link), at memberHome, alert (using js) the msg, then redirect to memberHome with no msg

    $d = $data[0];
    $d2 = $data2[0]
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        <title>Update Member's Contact</title>
    </head>

    <body>

        <br>

        <div id="formPage">

            <h1 id="mainHeader">Update Member Contact</h1>
            
            <div class="nice-form-group">
                <label>Member ID:</label>
                <input type="text" placeholder="" value="<?=$d2->member_id?>" style="--nf-input-size: 0.5rem" disabled>
              </div><!-- setup up the MemberID from AWD Assignment -->

            <div class="nice-form-group">
                <label>Member First Name:</label>
                <input type="text" placeholder="" value="<?=$d2->member_first_name?>" style="--nf-input-size: 0.5rem" disabled>
            </div>


            <div class="nice-form-group">
                <label>Member Last Name:</label>
                <input type="text" placeholder="" value="<?=$d2->member_last_name?>" style="--nf-input-size: 0.5rem" disabled>
            </div>    
            
            <br>  
            <hr>

            <form action="../backend/memberContactFormValidation.php" method="post">
                <div class="nice-form-group">
                    <label>Contact First Name:</label>
                    <input type="text" placeholder="" value="<?=$d->member_contact_first_name?>" style="--nf-input-size: 0.5rem" name="memberContactFirstName">
                </div>

                <div class="nice-form-group">
                    <label>Contact Last Name:</label>
                    <input type="text" placeholder="" value="<?=$d->member_contact_last_name?>" style="--nf-input-size: 0.5rem" name="memberContactLastName">
                </div>

                <div class="nice-form-group">
                    <label>Contact Address:</label>
                    <input type="text" placeholder="" value="<?=$d->member_contact_address?>" style="--nf-input-size: 0.5rem" name="memberContactAddress">
                </div>     

                <div class="nice-form-group">
                    <label>Contact Mobile Telephone:</label>
                    <input type="text" placeholder="" value="<?=$d->member_contact_phone_number?>" style="--nf-input-size: 0.5rem" name="memberContactPhone">
                </div>     

                <div class="nice-form-group">
                    <label>Contact Email:</label>
                    <input type="email" placeholder="" value="<?=$d->member_contact_email_address?>" style="--nf-input-size: 0.5rem" name="memberContactEmail">
                </div>

                <div class="nice-form-group">
                    <label>Contact Relationship to Member:</label>
                    <input type="text" placeholder="" value="<?=$d->member_contact_relationship?>" style="--nf-input-size: 0.5rem" name="memberContactRelationship">
                </div> 

                <br>

                <div id="addMemberContactsButton">
                    <div>
                        <button id="addMember" type="submit" name="btnUpdateContact" value="<?=$d->member_contact_id?>">Update</button>
                        <br>
                        <br>
                    </div>
                </div>
            </form>

            <div id="addMemberContactsButton">
                <div>
                    <form action="memberHome.php">
                        <button id="addMember" type="submit">Back</button>
                    </form>
                    <br>
                    <br>
                </div>
            </div>
            
        </div>
        

    </body>
</html>       

