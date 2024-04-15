<?php
    include_once "../backend/memberCRUD.php";

    $operation = "";

    if(isset($_GET["btnDetail"])){
        echo "Member's Detail" . "<br>";
        queryOneMember($_GET["btnDetail"]);
        $operation = "Detail";
    }

    if(isset($_GET["btnUpdate"])){
        echo "Update Member's Detail" . "<br>";
        queryOneMember($_GET["btnUpdate"]);
        $operation = "Update";
    }

    if(isset($_GET["btnAdd"])){
        echo "Create New Member" . "<br>";
        $operation = "Add";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member <?=$operation?></title>
</head>
<body>
    
</body>
</html>