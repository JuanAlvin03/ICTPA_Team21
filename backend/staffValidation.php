<?php
session_start();

require_once "staffCRUD.php";

// ADD
if
(isset($_POST["btnSubmit"])
           // && isset($_POST["memberFirstName"])
            //&& isset($_POST["memberLastName"])
            //&& isset($_POST["memberDOB"])
            //&& isset($_POST["memberAddress"])
            //&& isset($_POST["memberGender"])
)
{
    //Validations
    // if invalid data, ???????
    
    //It works, will return an array filled with the newly created record, check the memberCRUD to see structure of array
    $res = createStaff($_POST);
    
    $_SESSION["newStaffID"] = $res[0]->staff_id;

    header("Location: ../frontend/addStaffAvailabilityForm.php");
    exit;


    /*
    if(($res[0]->member_id !== null) && ($res[0]->member_id !== 0)){
        //redirect to member contact form, with success insert message, and member id
        $_SESSION["msg"] = "New member has been created successfully";
        $_SESSION["temp"] = $res[0]->member_id;
        header("Location: ../frontend/addContactForm.php");
        exit;
    }*/

    // if error, go back to member form
}

// UPDATE
if
(isset($_POST["btnUpdateMember"])
            && isset($_POST["memberFirstName"])
            && isset($_POST["memberLastName"])
            && isset($_POST["memberDOB"])
            && isset($_POST["memberAddress"])
            && isset($_POST["memberGender"])
)
{
    //Validations
    // if invalid data, ???????
    
    //It works, will return an array filled with the newly updated record, check the memberCRUD to see structure of array
    $res = updateMember($_POST);

    //redirect to member Home, with success update message
    if(($res[0]->member_id !== null) && ($res[0]->member_id !== 0)){
        //redirect to member contact form, with success insert message, and member id
        //$_SESSION["msg"] = "New member has been created successfully";
        header("Location: ../frontend/memberHome.php");
        exit;
    }

    //if error, go back to member form
}

?>