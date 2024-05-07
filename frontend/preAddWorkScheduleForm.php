<?php
session_start();
include_once "../backend/staffCRUD.php";

if(!isset($_SESSION["user"])){
    header("Location: login.php");
    exit;
}

if(!isset($_SESSION["staff"])){
    header("Location: login.php");
    exit;
}

$todayDate = date("Y-m-d");

$data = array();

if(isset($_GET["searchStaff"])){
    if($_GET["searchStaff"] != ""){
        $data = searchStaff($_GET["searchStaff"]);
    }
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
        
        
        <title>Add Work Schedule</title>
    </head>

    <body>

        <br>

        <div id="formPage">
          
            <h1 id="mainHeader">Search and Select Staff</h1>
            
            <form action="" method="get">
            <div class="nice-form-group">
              <label>Search Staff:</label>
                <input type="text" placeholder="Staff ID/Name" name="searchStaff" style="--nf-input-size: 0.5rem"><br><br>
                <button type="submit">Search</button>
            </div>
            </form>

            <!-- Searched Staffs -->

            <?php
                if((count($data) == 0) && isset($_GET["searchStaff"])): 
            ?>

            <div class="nice-form-group">
              <h4>No such Staff</h4>
            </div>  

            <?php endif;
              if(!isset($_GET["searchStaff"])) : 
            ?>

            <div class="nice-form-group">
              <h4>Search a Staff!</h4>
            </div>  

            <?php endif;
                  foreach ($data as $d) :
            ?>
              <div class="nice-form-group">
                <p>
                  <form action="addWorkScheduleForm.php" method="POST">
                    <?= $d->staff_id ?> - <?= $d->staff_first_name ?> <?= $d->staff_last_name ?>
                    <button type="submit" value="<?= $d->staff_id ?>" name="btnSubmit">Select</button>
                  </form>
                </p>
              </div>  

            <?php endforeach; ?>   

            <!-- Back Button -->
            <br>
            <div id="addMemberButton">
              <form action="staffHome.php">
                <button type="submit">Back</button>
              </form>
            </div>
    </body>
</html>       

