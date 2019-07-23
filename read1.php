<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here
include_once '../config/database.php';
include_once '../objects/categories.php';
 
// instantiate database and categories object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$categories = new Categories($db);
 
// read categories will be here
// query categories
$stmt = $categories->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // categories array
    $categories_arr=array();
    $categories_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $categories_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
        );
 
        array_push($categories_arr["records"], $categories_item);
    }
 
 
    // show categories data in json format
    echo json_encode($categories_arr);
}
 
// no categories found will be here
else{
 
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No categories found.")
    );
}