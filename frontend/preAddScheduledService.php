<?php
session_start();
include_once "../backend/memberCRUD.php";

$data = array();

if(isset($_GET["searchMember"])){
    if($_GET["searchMember"] != ""){
        $data = searchMembers($_GET["searchMember"]);
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

            <form action="" method="get">
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

            <!-- Searched Staffs -->

            <?php
                if((count($data) == 0) && isset($_GET["searchMember"])): 
            ?>

            <div class="nice-form-group">
              <h4>No such Member</h4>
            </div>  

            <?php endif;
              if(!isset($_GET["searchMember"])) : 
            ?>

            <div class="nice-form-group">
              <h4>Search a Member!</h4>
            </div>  

            <?php endif;
                  foreach ($data as $d) :
            ?>
              <div class="nice-form-group">
                <p>
                  <form action="addScheduledService.php" method="POST">
                    <?= $d->member_id ?> - <?= $d->member_first_name ?> <?= $d->member_last_name ?>
                    <button type="submit" value="<?= $d->member_id ?>" name="btnNext">Select</button>
                  </form>
                </p>
              </div>  

            <?php endforeach; ?>   

            <!-- Back Button -->
            <br>
            <div id="addMemberButton">
              <form action="memberHome.php">
                <button type="submit">Back</button>
              </form>
            </div>
            
        </div>



        

    </body>
</html>       

