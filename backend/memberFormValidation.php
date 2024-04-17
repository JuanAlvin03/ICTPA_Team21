<?php

require_once "memberCRUD.php";

// ADD
if
(isset($_POST["btnAddMember"])
            && isset($_POST["memberFirstName"])
            && isset($_POST["memberLastName"])
            && isset($_POST["memberDOB"])
            && isset($_POST["memberAddress"])
)
{
    //Validations
    
    //It works, will return an array filled with the newly created record, check the memberCRUD to see structure of array
    //createMember($_POST);

    //redirect to member contact form, with success insert message
    // if error, go back to member form
}

// UPDATE
if
(isset($_POST["btnAddMember"])
            && isset($_POST["memberFirstName"])
            && isset($_POST["memberLastName"])
            && isset($_POST["memberDOB"])
            && isset($_POST["memberAddress"])
)
{
    //Validations
    
    //It works, will return an array filled with the newly created record, check the memberCRUD to see structure of array
    //createMember($_POST);

    //redirect to member contact form, with success insert message
    // if error, go back to member form
}

?>