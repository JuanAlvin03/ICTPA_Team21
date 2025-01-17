<?php
require "vendor/autoload.php";

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
        'select' => '*',
        'from'   => 'scheduled_service',
        'join' => 
        [
            [
                'table' => 'member',
                'tablekey' => 'member_id'
            ],
            [
                'table' => 'service',
                'tablekey' => 'service_id'
            ]
        ]
    ];
    
    try{
        $listMember = $db->createCustomQuery($query)->getResult();
        return $listMember;
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}

// GET TODAYS SERVICE
function queryTodayService(){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('scheduled_service', 'scheduled_service_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => '*',
        'from'   => 'scheduled_service',
        'join' => 
        [
            [
                'table' => 'member',
                'tablekey' => 'member_id'
            ],
            [
                'table' => 'service',
                'tablekey' => 'service_id'
            ]
        ],
        'where' => 
        [
            'service_start_date_time' => 'gt.' . date("Y-m-d")
        ],
        'order' => 'service_start_date_time.asc',
    ];
    
    try{
        $listMember = $db->createCustomQuery($query)->getResult();
        return $listMember;
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}

// GET all SCHEDULED SERVICE of a staff/carer
function queryStaffScheduledService($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('scheduled_service', 'scheduled_service_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => '*',
        'from'   => 'scheduled_service',
        'join' => 
        [
            [
                'table' => 'member',
                'tablekey' => 'member_id'
            ],
            [
                'table' => 'service',
                'tablekey' => 'service_id'
            ]
        ],
        'where' => 
        [
            'staff_id' => 'eq.' . intval($id)
        ],
        'order' => 'service_start_date_time.asc',
    ];
    
    try{
        $listMember = $db->createCustomQuery($query)->getResult();
        return $listMember;
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}

// Get scheduled service of a member
function queryMemberScheduledService($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('scheduled_service', 'scheduled_service_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => '*',
        'from'   => 'scheduled_service',
        'join' => 
        [
            [
                'table' => 'member',
                'tablekey' => 'member_id'
            ],
            [
                'table' => 'service',
                'tablekey' => 'service_id'
            ]
        ],
        'where' => 
        [
            'member_id' => 'eq.' . intval($id)
        ],
        'order' => 'service_start_date_time.asc',
    ];
    
    try{
        $listMember = $db->createCustomQuery($query)->getResult();
        return $listMember;
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}

// GET ONE SCHEDULED SERVICE
function queryOneScheduledService($id){

    $service = new PHPSupabase\Service(
        // PROJECT API KEY
        "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
        // PROJECT URL
        "https://egzfkwqwoobkavbxoxry.supabase.co"
    );

    $db = $service->initializeDatabase('scheduled_service', 'scheduled_service_id'); //param(tablename, column name of PK)
    
    $query = [
        'select' => '*',
        'from'   => 'scheduled_service',
        'where' => 
        [
            'member_id' => 'eq.1'
        ]
    ];
    
    try{
        $listMember = $db->createCustomQuery($query)->getResult();
        return $listMember;
    }
    catch(Exception $e){
        return $e->getMessage();
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
        'service_start_date_time' => $input["date"] . " " . $input["time"] . ":00",
        'service_location_address' => $input["address"],
        'service_id' => $input["serviceID"],
        'member_id' => $input["btnSubmit"],
    ];
    
    try{
        $data = $db->insert($newService);
        return $data; //returns an array with the new register data
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

// UPDATE SCHEDULED SERVICE
function updateScheduledService($id){

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