<?php
require "vendor/autoload.php";

$service = new PHPSupabase\Service(
    // PROJECT API KEY
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVnemZrd3F3b29ia2F2YnhveHJ5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MTA5Nzc1MTcsImV4cCI6MjAyNjU1MzUxN30.0EG7AWB6TsRMqTssMS9bhf0plepaG1EPpMiX1jW8aUE", 
    // PROJECT URL
    "https://egzfkwqwoobkavbxoxry.supabase.co"
);

$db = $service->initializeDatabase('categories', 'id');

$newCategory = [
    'categoryname' => 'Food'
];

try{
    $data = $db->insert($newCategory);
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
?>