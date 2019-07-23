<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/categories.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare categories object
$categories = new Categories($db);
 
// get id of category to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$categories->id = $data->id;
 
// set product property values
$categories->id = $data->id;
$categories->name= $data->name;
$categories->description = $data->description;

 
// update the categories
if($categories->update()){
 
 
    // tell the user
    echo json_encode(array("message" => "Category was updated."));
}
 
// if unable to update the category, tell the user
else{
 
    // tell the user
    echo json_encode(array("message" => "Unable to update category."));
}
?>