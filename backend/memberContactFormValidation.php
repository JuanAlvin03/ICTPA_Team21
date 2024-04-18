<?php
session_start();
require_once "memberContactCRUD.php";

// ADD
if
(isset($_POST["btnAddContact"])
            && isset($_POST["memberContactFirstName"])
            && isset($_POST["memberContactLastName"])
            && isset($_POST["memberContactAddress"])
            && isset($_POST["memberContactPhone"])
            && isset($_POST["memberContactEmail"])
            && isset($_POST["memberContactRelationship"])
)
{
    //Validations
    // if invalid data, ???????
    
    //It works, will return an array filled with the newly created record, check the memberContactCRUD to see structure of array
    $res = createMemberContact($_POST);
    if(($res[0]->member_contact_id !== null) && ($res[0]->member_contact_id !== 0)){
        //redirect to member contact form, with success insert message, and member id


        header("Location: ../frontend/memberHome.php");
        exit;
    }

    //redirect to memberHome, with success insert message

    // if error, go back to member form
}

// UPDATE
if
(isset($_POST["btnUpdateContact"])
            && isset($_POST["memberContactFirstName"])
            && isset($_POST["memberContactLastName"])
            && isset($_POST["memberContactAddress"])
            && isset($_POST["memberContactPhone"])
            && isset($_POST["memberContactEmail"])
            && isset($_POST["memberContactRelationship"])
)
{
    //Validations
    // if invalid data, ???????
    
    //It works, will return an array filled with the newly updated record, check the memberContactCRUD to see structure of array
    //var_dump($_POST);
    $res = updateMemberContact($_POST);

    //redirect to member Home, with success update message
    if(($res[0]->member_contact_id !== null) && ($res[0]->member_contact_id !== 0)){
        //redirect to member contact form, with success insert message, and member id
        //$_SESSION["msg"] = "New member has been created successfully";
        header("Location: ../frontend/memberHome.php");
        exit;
    }
    //if error, go back to member form
}

?>