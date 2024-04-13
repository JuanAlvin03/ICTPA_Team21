<?php
require "vendor/autoload.php";

/*

NEEDED FUNCTIONS:

- Get One Member contact //only one needed, since the only way to search contact is probably through member
- Create (must)
- Update (must)
- Delete (we dont have status attr yet, or hard delete) (must)

*/

// GET MEMBER CONTACT (ONLY ONE)
function queryMemberContact(/*$id*/){ // param is member id

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member_contact', 'member_contact_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => 'member_contact_id,member_contact_first_name,member_contact_last_name',
        'from'   => 'member_contact',
        'where' => 
        [
            'member_contact_status' => 'eq.active',
            'member_id' => 'eq.1' // Member ID from param
        ]
    ];
    
    try{
        $listMemberContact = $db->createCustomQuery($query)->getResult();
        foreach ($listMemberContact as $memberContact){
            echo $memberContact->member_contact_id . ' - ' . 
            $memberContact->member_contact_first_name . ' ' . 
            $memberContact->member_contact_last_name . '<br />';
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

// INSERT NEW MEMBER CONTACT
function createMemberContact(){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member_contact', 'member_contact_id'); //param(tablename, column name of PK)
    
    $newMemberContact = [
        // MEMBER CONTACT ID IS AUTO INCREMENT, DO NOT INPUT MANUALLY
        'member_contact_first_name' => 'Kevin',
        'member_contact_last_name' => 'Smith',
        'member_contact_phone_number' => '0488756123',  // maybe need to check length
        'member_contact_email_address' => 'ksmth85@gmail.com',  // need to check if in correct email format or not
        'member_contact_relationship' => 'Child of member',
        'member_contact_address' => '300 Glenferrie Road, Hawthorn, Australia',
        'member_id' => '6', // Foreign KEY

        //'member_contact_status' => 'active', // status is DEFAULT ACTIVE
    ];
    
    try{
        $data = $db->insert($newMemberContact);
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

// UPDATE MEMBER CONTACT
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

// DELETE MEMBER CONTACT (SOFT DELETE)
function deleteMemberContact($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member_contact', 'member_contact_id'); //param(tablename, column name of PK)

    //query contact based on member id
    //update contact's status based in the queried contact id

    try{
        $data = $db->delete($id); //the parameter is the product id
        echo 'Product deleted successfully';
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

?>