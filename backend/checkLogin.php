<?php
session_start();
require_once "staffAccountCRUD.php";
require_once "staffCRUD.php";

if(isset($_POST["username"]) && isset($_POST["password"]))
{
    $query = queryOneAccount($_POST["username"]);
    if($query === []){
        header("Location: ../frontend/login.php");
        exit;
    }

    $acc = $query[0];
    if($acc->account_password !== $_POST["password"]){
        header("Location: ../frontend/login.php");
        exit;
    } else {
        $_SESSION["user"] = $acc;

        $_SESSION["staff"] = queryOneStaff($acc->staff_id)[0];
        header("Location: ../frontend/staffHome.php");
        exit;
    }
}

?>