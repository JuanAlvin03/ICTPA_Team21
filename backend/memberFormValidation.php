<?php
session_start();
require_once "memberCRUD.php";

// ADD
if
(isset($_POST["btnAddMember"])
            && isset($_POST["memberFirstName"])
            && isset($_POST["memberLastName"])
            && isset($_POST["memberDOB"])
            && isset($_POST["memberAddress"])
            && isset($_POST["memberGender"])
)
{
    //Validations
    // if invalid data, ???????
    
    //It works, will return an array filled with the newly created record, check the memberCRUD to see structure of array
    createMember($_POST);

    //redirect to member contact form, with success insert message, and member id


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