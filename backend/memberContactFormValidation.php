<?php
session_start();
require_once "memberCRUD.php";

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
    createMember($_POST);

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
    $update = updateMember($_POST);

    //redirect to member Home, with success update message
    /*
    if($update[0]->id){

    }
    $_SESSION["msg"] = "";
    header("Location: memberHome.php");
*/
    //if error, go back to member form
}

?>