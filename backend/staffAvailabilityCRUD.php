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

// GET ONE work schedule (BASED ON ID)
function queryOneAvailability($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff_availability', 'staff_availability_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => '*',
        'from'   => 'work_schedule',
        'where' => 
        [
            'work_schedule_id' => 'eq.' . intval($id)
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

// INSERT WORK SCHEDULE
function createAvailability($input){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff_availability', 'staff_availability_id'); //param(tablename, column name of PK)
    
    $insert = [
        //ID IS AUTO INCREMENT, DO NOT INPUT MANUALLY
        'mon_start' => $input["mons"] . ":00",
        'mon_end' => $input["mone"] . ":00",
        'tue_start' => $input["tues"] . ":00",
        'tue_end' => $input["tuee"] . ":00",
        'wed_start' => $input["weds"] . ":00",
        'wed_end' => $input["wede"] . ":00",
        'thu_start' => $input["thus"] . ":00",
        'thu_end' => $input["thue"] . ":00",
        'fri_start' => $input["fris"] . ":00",
        'fri_end' => $input["frie"] . ":00",
        'sat_start' => $input["sats"] . ":00",
        'sat_end' => $input["sate"] . ":00",
        'sun_start' => $input["suns"] . ":00",
        'sun_end' => $input["sune"] . ":00",
        'staff_id' => $input["btnSubmit"],
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

// UPDATE MEMBER
function updateAvailability($input){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('staff_availability', 'staff_availability_id'); //param(tablename, column name of PK)
    
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

?>