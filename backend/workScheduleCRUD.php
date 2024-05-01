<?php
require "vendor/autoload.php";

/*

NEEDED FUNCTIONS:

- Query All members (not sure when to use this, whats needed is probably list of members that has some special req or list filtered/searched using search bar)
- Query some members (for search bar???? or some kind of filtering) (not created yet)
- Get One Member (must)
- Create (must)
- Update (must)
- Delete (we dont have status attr yet, or hard delete) (must)

*/

// GET MEMBER
function queryMembers(){

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

// SEARCH MEMBERS BY ID OR NAME (FIRST OR LAST)
function searchMembers($param){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member', 'member_id'); //argument is (tablename, column name of PK)

    $listMember = array();
    $listMember2 = array();

    if(is_numeric($param)){
        if(intval($param) > 0){
            $query = [
                'select' => 'member_id,member_first_name,member_last_name,member_dob,member_address',
                'from'   => 'member',
                'where' => 
                [
                    'member_id' => 'eq.' . intval($param)
                ]
            ];
            
            try{
                $listMember = $db->createCustomQuery($query)->getResult();
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    } 
    else {
        $query = [
            'select' => 'member_id,member_first_name,member_last_name,member_dob,member_address',
            'from'   => 'member',
            'where' => 
            [
                'member_first_name' => 'ilike.%' . strval($param) . '%'
            ]
        ];
        
        try{
            $listMember = $db->createCustomQuery($query)->getResult();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    
        $query = [
            'select' => 'member_id,member_first_name,member_last_name,member_dob,member_address',
            'from'   => 'member',
            'where' => 
            [
                'member_last_name' => 'ilike.%' . strval($param) . '%'
            ]
        ];
        
        try{
            $listMember2 = $db->createCustomQuery($query)->getResult();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        array_push($listMember, ...$listMember2);
    }

    /*
    foreach ($listMember1 as $member){
        echo $member->member_id . ' - ' . $member->member_first_name . ' ' . $member->member_last_name . '<br />';
    }
    */
    return $listMember;
}

// GET ONE MEMBER (BASED ON ID)
function queryOneMember($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member', 'member_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => 'member_id,member_first_name,member_last_name,member_dob,member_address,member_gender',
        'from'   => 'member',
        'where' => 
        [
            'member_id' => 'eq.' . intval($id)
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

// INSERT NEW MEMBER
function createMember($input){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member', 'member_id'); //param(tablename, column name of PK)
    
    $newMember = [
        // MEMBER ID IS AUTO INCREMENT, DO NOT INPUT MANUALLY
        'member_first_name' => $input["memberFirstName"],
        'member_last_name' => $input["memberLastName"],
        'member_dob' => $input["memberDOB"],  // date must be checked (less than today)
        'member_gender' => $input["memberGender"],
        'member_address' => $input["memberAddress"],
        // 'additional_notes' => $input["memberAddInfo"] //  additional notes, in json?
    ];
    
    try{
        $data = $db->insert($newMember);
        return($data); //returns an array with the new register data
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
        return $e->getMessage();
    }
}

// UPDATE MEMBER
function updateMember($input){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member', 'member_id'); //param(tablename, column name of PK)
    
    // DONT EVER UPDATE MEMBER ID
    $updateMember = [
        'member_first_name' => $input["memberFirstName"],
        'member_last_name' => $input["memberLastName"],
        'member_dob' => $input["memberDOB"],  // date must be checked (less than today)
        'member_gender' => $input["memberGender"],
        'member_address' => $input["memberAddress"],
        // 'additional_notes' => $input["memberAddInfo"] //  additional notes, in json?
    ];

    try{
        $data = $db->update(intval($input["btnUpdateMember"]), $updateMember); //the first parameter is the id/pk
        return($data); //returns an array with the product data (updated)
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
        return $e->getMessage();
    }
}

// DELETE MEMBER
function deleteMember($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('member', 'member_id'); //param(tablename, column name of PK)

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