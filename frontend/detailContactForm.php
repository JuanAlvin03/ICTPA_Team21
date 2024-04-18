<?php
    //cek login info

    // need to check if member id, first, lastname are set
    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        <title>Member's Contact Detail</title>
    </head>

    <body>

        <br>

        <div id="formPage">

            <h1 id="mainHeader">Member Contacts Detail</h1>
            
            <div class="nice-form-group">
                <label>Member ID:</label>
                <input type="text" placeholder="" value="MID0001" style="--nf-input-size: 0.5rem" disabled>
              </div><!-- setup up the MemberID from AWD Assignment -->

            <div class="nice-form-group">
                <label>Member First Name:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" disabled>
            </div>


            <div class="nice-form-group">
                <label>Member Last Name:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" disabled>
            </div>    
            
            <br>  
            <hr>

            <div class="nice-form-group">
                <label>Contact First Name:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactFirstName" disabled>
            </div>

            <div class="nice-form-group">
                <label>Contact Last Name:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactLastName" disabled>
            </div>

            <div class="nice-form-group">
                <label>Contact Address:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactAddress" disabled>
            </div>     

            <div class="nice-form-group">
                <label>Contact Mobile Telephone:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactPhone" disabled>
            </div>     

            <div class="nice-form-group">
                <label>Contact Email:</label>
                <input type="email" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactEmail" disabled>
            </div>

            <div class="nice-form-group">
                <label>Contact Relationship to Member:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="memberContactRelationship" disabled>
            </div>    

            <br>

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

