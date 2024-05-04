<?php
require "vendor/autoload.php";

/*
// GET MEMBER
function queryWork(){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member', 'member_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => 'member_id,member_first_name,member_last_name',
        'from'   => 'member'
    ];
    
    try{
        $listMember = $db->createCustomQuery($query)->getResult();
        foreach ($listMember as $member){
            echo $member->member_id . ' - ' . $member->member_first_name . ' ' . $member->member_last_name . '<br />';
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
*/

// GET ONE work schedule (BASED ON USERNAME)
function queryOneAccount($username){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff_account', 'account_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => '*',
        'from'   => 'staff_account',
        'where' => 
        [
            'account_name' => 'eq.' . $username
        ]
    ];
    
    try{
        $member = $db->createCustomQuery($query)->getResult();
        return $member;
    }
    catch(Exception $e){
        //echo $e->getMessage();
        return $e->getMessage();
    }
}

// Create Account
function createAccount($input){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff_account', 'account_id'); //param(tablename, column name of PK)
    
    $insert = [
        //ID IS AUTO INCREMENT, DO NOT INPUT MANUALLY
        'account_name' => $input["account_name"],
        'account_password' => $input["account_password"],
        'staff_id' => $input["staff_id"],
    ];
    
    try{
        $data = $db->insert($insert);
        return($data); //returns an array with the new register data
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}


// UPDATE MEMBER
/*
function updateWork($input){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('work_schedule', 'work_schedule_id'); //param(tablename, column name of PK)
    
    // DONT EVER UPDATE MEMBER ID
    $updateMember = [
        //ID IS AUTO INCREMENT, DO NOT INPUT MANUALLY
        'start' => $input["dateStart"] . " " . $input["timeStart"] . ":00",
        'end' => $input["dateEnd"] . " " . $input["timeEnd"] . ":00",
        'staff_id' => $input["btnSubmit"],
    ];

    try{
        $data = $db->update(intval($input["btnUpdate"]), $updateMember); //the first parameter is the id/pk
        return($data); //returns an array with the product data (updated)
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}
*/

// DELETE MEMBER
/*
function deleteWork($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('work_schedule', 'work_schedule_id'); //param(tablename, column name of PK)

    // IF SOFT DELETE, UPDATE STATUS TO INACTIVE
    
    try{
        $data = $db->delete($id); //the parameter is the product id
        echo 'Product deleted successfully';
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
*/
?>