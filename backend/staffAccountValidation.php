<?php
session_start();
require_once "staffAccountCRUD.php";

// ADD
if
(isset($_SESSION["newStaffID"])
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
    $input = array();
    $input = [
        "account_name" => "account" . $_SESSION["newStaffID"],
        "account_password" => "account" . $_SESSION["newStaffID"],
        "staff_id" => $_SESSION["newStaffID"],
    ];

    $res = createAccount($input);
    header("Location: ../frontend/staffHome.php");
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
(isset($_POST["btnUpdate"])

)
{
    //Validations
    // if invalid data, ???????
    
    //It works, will return an array filled with the newly updated record, check the memberCRUD to see structure of array
    $res = updateAvailability($_POST);
    header("Location: ../frontend/staffHome.php");
    exit;
}

?>