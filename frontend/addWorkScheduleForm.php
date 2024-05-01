<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Aged Care Management System" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        
        <title>Staff Availability Schedule</title>
    </head>

    <body>

        <br>

        <div id="formPage">
          
            <h1 id="mainHeader">Set Availability</h1>
            
            <div class="nice-form-group">
              <label>Staff ID:</label>
              <input type="text" disabled placeholder="" value="MID2233" style="--nf-input-size: 0.5rem"/>
            </div>

            <div class="nice-form-group">
              <label>Staff First Name:</label>
              <input type="text" disabled placeholder="" value="" style="--nf-input-size: 0.5rem"/>
            </div>

            <div class="nice-form-group">
              <label>Staff Last Name:</label>
              <input type="text" disabled placeholder="" value="" style="--nf-input-size: 0.5rem"/>
            </div>

            <form action="" method="post">

            <div class="nice-form-group">
                <label>Date (MM/DD/YYYY):</label>
                <input type="date" value="" style="--nf-input-size: 0.5rem" min="<?=$todayDate?>" name="date">
            </div>

            <div id="centeringID" class="nice-form-group">
              <label>Time:</label>
              <input type="time" value="09:00" style="--nf-input-size: 0.5rem" name="start"> to
              <input type="time" value="17:00" style="--nf-input-size: 0.5rem" name="end">
            </div>

            <br>

            <div id="addMemberButton">
                <div>
                    <button id="addMember" type="button" value="Add Staff Schedule" name="btnSubmit">Add Work Schedule</button>
                    <br>
                    <br>
                </div>
            </div>

            </form>

    </body>
</html>       

