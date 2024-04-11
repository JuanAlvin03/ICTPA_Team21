<?php
require "vendor/autoload.php";

// GET MEMBER
function queryMemberContact(/*$id*/){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member_contact', 'member_contact_id'); //param(tablename, column name of PK)
    
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

// INSERT NEW MEMBER
function createMemberContact(){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member_contact', 'member_contact_id'); //param(tablename, column name of PK)
    
    $newMember = [
        // MEMBER CONTACT ID IS AUTO INCREMENT, DO NOT INPUT MANUALLY
        'member_first_name' => 'Harold',
        'member_last_name' => 'Fergusson',
        'member_dob' => '1940-03-19',  // date must be checked (less than today)
        'member_gender' => 'Male',
        'member_address' => '70 Puckle Street, Melbourne',
        //'member_status' => 'active', // status is DEFAULT ACTIVE
        //'member_first_name' => 'Video Games' //  additional notes
    ];
    
    try{
        $data = $db->insert($newMember);
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

// UPDATE MEMBER
function updateMemberContact(/*$id*/){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member_contact', 'member_contact_id'); //param(tablename, column name of PK)
    
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

// DELETE MEMBER
function deleteMemberContact($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member_contact', 'member_contact_id'); //param(tablename, column name of PK)

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