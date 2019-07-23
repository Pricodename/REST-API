<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/categories.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare categories object
$categories = new Categories($db);
 
// set ID property of record to read
$categories->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of categories to be edited
$categories->read_single1();
 
if($categories->name!=null){
    // create array
    $categories_arr = array(
        "id" =>  $categories->id,
        "name" => $categories->name,
        "description" => $categories->description,
 
    );

 
    // make it json format
    echo json_encode($product_arr);
}
 
else{
 
    // tell the user category does not exist
    echo json_encode(array("message" => "Category does not exist."));
}
?>