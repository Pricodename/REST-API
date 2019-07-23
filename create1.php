<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate categories object
include_once '../objects/categories.php';
 
$database = new Database();
$db = $database->getConnection();
 
$categories = new Categories($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->id) &&
    !empty($data->name) &&
    !empty($data->description) &&
    
){
 
    // set category property values
    $categories->id = $data->id;
    $categories->name= $data->name;
    $categories->description = $data->description;
    $categories->created = date('Y-m-d H:i:s');
 
    // create the category
    if($categories->create()){
 
        // tell the user
        echo json_encode(array("message" => "Category was created."));
    }
 
    // if unable to create the category, tell the user
    else{
 
 
        // tell the user
        echo json_encode(array("message" => "Unable to create category."));
    }
}
 
// tell the user data is incomplete
else{

 
    // tell the user
    echo json_encode(array("message" => "Unable to create category. Data is incomplete."));
}
?>