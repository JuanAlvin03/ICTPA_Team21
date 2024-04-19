<?php
session_start();
require_once "scheduledServiceCRUD.php";

// ADD
if
(isset($_POST["btnSubmit"])
            && isset($_POST["serviceLoc"])
            && isset($_POST["address"])
            && isset($_POST["date"])
            && isset($_POST["time"])
)
{
    //Validations
    // if invalid data, ???????
    
    $res = createScheduledService($_POST);
    
    if(($res[0]->scheduled_service_id !== null) && ($res[0]->scheduled_service_id !== 0)){
        //redirect to member contact form, with success insert message, and member id
        //$_SESSION["msg"] = "New member has been created successfully";
        //$_SESSION["temp"] = $res[0]->member_id;
        header("Location: ../frontend/memberHome.php");
        exit;
    }
    
}

?>