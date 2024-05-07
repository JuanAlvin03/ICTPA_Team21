<?php
require "vendor/autoload.php";

/*

NEEDED FUNCTIONS:

- Query All staff 
- Get One staff (must)
- Create (must)
- Update (must)
- Delete (we dont have status attr yet, or hard delete) (must)

*/

// GET STAFF
function queryStaffs(){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff', 'staff_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => '*',
        'from'   => 'staff'
    ];
    
    try{
        $listMember = $db->createCustomQuery($query)->getResult();
        return $listMember;
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}

// SEARCH STAFF BY ID OR NAME (FIRST OR LAST)
function searchStaff($param){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff', 'staff_id'); //argument is (tablename, column name of PK)

    $listMember = array();
    $listMember2 = array();

    if(is_numeric($param)){
        if(intval($param) > 0){
            $query = [
                'select' => 'staff_id,staff_first_name,staff_last_name',
                'from'   => 'staff',
                'where' => 
                [
                    'staff_id' => 'eq.' . intval($param)
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
            'select' => 'staff_id,staff_first_name,staff_last_name',
            'from'   => 'staff',
            'where' => 
            [
                'staff_first_name' => 'ilike.%' . strval($param) . '%'
            ]
        ];
        
        try{
            $listMember = $db->createCustomQuery($query)->getResult();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    
        $query = [
            'select' => 'staff_id,staff_first_name,staff_last_name',
            'from'   => 'staff',
            'where' => 
            [
                'staff_last_name' => 'ilike.%' . strval($param) . '%'
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

// GET ONE STAFF (BASED ON ID)
function queryOneStaff($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff', 'staff_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => '*',
        'from'   => 'staff',
        'where' => 
        [
            'staff_id' => 'eq.' . intval($id)
        ]
    ];
    
    try{
        $queryResult = $db->createCustomQuery($query)->getResult();
        return $queryResult;
    }
    catch(Exception $e){
        //echo $e->getMessage();
        return $e->getMessage();
    }
}

// INSERT NEW Staff
function createStaff($input){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff', 'staff_id'); //param(tablename, column name of PK)
    
    $insert = [
        //ID IS AUTO INCREMENT, DO NOT INPUT MANUALLY
        'staff_first_name' => $input["firstName"],
        'staff_last_name' => $input["lastName"],
        'staff_dob' => $input["dob"],
        'staff_gender' => $input["gender"],
        'staff_address' => $input["address"],
        'staff_phone_number' => $input["phone"],
        'staff_email' => $input["email"],
        'position' => $input["position"],
        'staff_employment_type' => $input["employmentType"],
        'manager_id' => $input["managerID"], // must be int
    ];
    
    try{
        $data = $db->insert($insert);
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

// UPDATE staff
function updateStaff($input){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff', 'staff_id'); //param(tablename, column name of PK)
    
    // DONT EVER UPDATE ID
    $update = [
        //ID IS AUTO INCREMENT, DO NOT INPUT MANUALLY
        'staff_first_name' => $input["firstName"],
        'staff_last_name' => $input["lastName"],
        'staff_dob' => $input["dob"],
        'staff_gender' => $input["gender"],
        'staff_address' => $input["address"],
        'staff_phone_number' => $input["phone"],
        'staff_email' => $input["email"],
        'position' => $input["position"],
        'staff_employment_type' => $input["employmentType"],
        'manager_id' => $input["managerID"],
    ];

    try{
        $data = $db->update(intval($input["btnUpdate"]), $update); //the first parameter is the id/pk
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

// DELETE Staff
function deleteStaff($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff', 'staff_id'); //param(tablename, column name of PK)

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