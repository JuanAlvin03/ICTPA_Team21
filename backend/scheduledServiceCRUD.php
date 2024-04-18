<?php
require "vendor/autoload.php";

/*

NEEDED FUNCTIONS:

- Query Scheduled Services (in a day?? week? for a particular member?)
- Get One Scheduled service 
- Create
- Update 
- Delete (we dont have status attr yet, or hard delete)

*/


// GET SCHEDULED SERVICE
function queryScheduledService(){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('scheduled_service', 'scheduled_service_id'); //param(tablename, column name of PK)
    
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

// GET ONE SCHEDULED SERVICE
function queryOneScheduledService(){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('scheduled_service', 'scheduled_service_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => 'member_id,member_first_name,member_last_name',
        'from'   => 'member',
        'where' => 
        [
            'member_id' => 'eq.1'
        ]
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

// INSERT SCHEDULED SERVICE
function createScheduledService($input){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('scheduled_service', 'scheduled_service_id'); //param(tablename, column name of PK)
    
    $newService = [
        // MEMBER ID IS AUTO INCREMENT, DO NOT INPUT MANUALLY
        'service_start_date_time' => 'Sammy',
        'service_location_address' => 'Samson',
        'service_id' => '1954-11-29',  // date must be checked (less than today)
        'member_id' => 'Male',
    ];
    
    try{
        $data = $db->insert($newService);
        print_r($data); //returns an array with the new register data
        /*
            Array
            (
                [0] => stdClass Object
                    (
                        [id] => 1
                        [categoryname] => Video Games
                    )
    
            )
        */
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// UPDATE SCHEDULED SERVICE
function updateScheduledService(/*$id*/){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('scheduled_service', 'scheduled_service_id'); //param(tablename, column name of PK)
    
    // DONT EVER UPDATE MEMBER ID
    $updateMember = [
        'member_first_name' => 'Tom2',
        'member_last_name' => 'Jefferson2',
        //'member_dob' => '1950-09-29',  // date must be checked (less than today)
        //'member_gender' => 'Male',
        'member_address' => '124 Swanston Street, Melbourne',
        //'member_status' => 'active', // status is DEFAULT ACTIVE
        //'member_first_name' => 'Video Games' //  additional notes
    ];

    try{
        $data = $db->update(6, $updateMember); //the first parameter is the product id
        print_r($data); //returns an array with the product data (updated)
        /*
            Array
            (
                [0] => stdClass Object
                    (
                        [id] => 1
                        [productname] => XBOX Series S 512GB
                        [price] => 319.99
                        [categoryid] => 1
                    )
            )
        */
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// DELETE SCHEDULED SERVICE
function deleteScheduledService($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('scheduled_service', 'scheduled_service_id'); //param(tablename, column name of PK)

    // IF SOFT DELETE, UPDATE STATUS TO INACTIVE
    
    try{
        $data = $db->delete($id); //the parameter is the product id
        echo 'Product deleted successfully';
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

?>