<?php
$todayDate = date("Y-m-d");

if(!isset($_SESSION["user"])){
  header("Location: ../frontend/login.php");
  exit;
}

if(!isset($_SESSION["staff"])){
  header("Location: ../frontend/login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Aged Care Management System" />
        <meta name="keywords" content="HTML/CSS/PHP/MySQL" />

        <link rel="stylesheet" href="https://unpkg.com/nice-forms.css@0.1.7/dist/nice-forms.css" />   
        <link rel="stylesheet" type="text/css" href="styles/formStyle.css">
        
        
        <title>New Staff Form</title>
    </head>

    <body>

        <br>

        <div id="formPage">


            <h1 id="mainHeader">Add New Staff Details</h1>

            <form action="../backend/staffValidation.php" method="post">

            
            <div class="nice-form-group">
                <label>First Name:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="firstName">
            </div>


            <div class="nice-form-group">
                <label>Last Name:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="lastName">
            </div>

            <div class="nice-form-group">
                <label>Date of Birth (MM/DD/YYYY):</label>
                <input type="date" value="" style="--nf-input-size: 0.5rem" max="<?=$todayDate?>" name="dob">
            </div>

            <div class="nice-form-group">
                <label>Address:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="address">
            </div>   

            <div class="nice-form-group">
              <label>Mobile Phone Number:</label>
              <input type="tel" placeholder="" value="" style="--nf-input-size: 0.5rem" name="phone">
            </div>

            <div class="nice-form-group">
              <label>Email:</label>
              <input type="email" placeholder="" value="" style="--nf-input-size: 0.5rem" name="email">
            </div>

              <fieldset class="nice-form-group">
                <legend>Gender:</legend>
                <div class="nice-form-group">
                  <input type="radio" name="gender" id="male" value="Male" checked>
                  <label for="male">Male</label>
                </div>
              
                <div class="nice-form-group">
                  <input type="radio" name="gender" id="female" value="Female">
                  <label for="female">Female</label>
                </div>
              
                <div class="nice-form-group">
                  <input type="radio" name="gender" id="other" value="Other">
                  <label for="other">Other</label>
                </div>
              </fieldset>

              <div class="nice-form-group">
                <label>Position Title:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="position">
              </div>
         
              <fieldset class="nice-form-group">
                <label>Staff Employment Type:</label>
                <div class="nice-form-group">
                  <input type="radio" name="employmentType" id="r-1" value="Full Time" checked>
                  <label for="full">Full Time</label>
                </div>
               
                <div class="nice-form-group">
                    <input type="radio" name="employmentType" id="r-2" value="Part Time">
                    <label for="part">Part Time</label>
                </div>
                
                <div class="nice-form-group">
                    <input type="radio" name="employmentType" id="r-3" value="Casual">
                    <label for="casual">Casual</label>
                </div>  

              </fieldset>

              <div class="nice-form-group">
                <label>Manager ID:</label>
                <input type="text" placeholder="" value="" style="--nf-input-size: 0.5rem" name="managerID">
              </div>

            <br>

            <div id="addMemberButton">
                <div>
                    <button id="addMember" type="submit" value="Add Staff Member" name="btnSubmit">Add Staff</button>
                    <br>
                    <br>
                </div>
            </div>

            </form>

            <!-- Back Button -->
            <div id="addMemberButton">
              <form action="staffHome.php">
                <button type="submit">Back</button>
              </form>
            </div>
            
    </body>
</html>       

