<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object file
include_once '../config/database.php';
include_once '../objects/categories.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare category object
$categories = new Categories($db);
 
// get product id
$data = json_decode(file_get_contents("php://input"));
 
// set category id to be deleted
$categories->id = $data->id;
 
// delete the category
if($categories->delete()){

 
    // tell the user
    echo json_encode(array("message" => "Category was deleted."));
}
 
// if unable to delete the category
else{
 
 
    // tell the user
    echo json_encode(array("message" => "Unable to delete Category."));
}
?>