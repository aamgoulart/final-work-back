<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate product object
include_once '../objects/student.php';
  
$database = new Database();
$db = $database->getConnection();
  
$product = new Student($db);
  
// get posted data

$product->id_student = isset($_GET['id_student']) ? $_GET['id_student'] : die();
$product->course = isset($_GET['course']) ? $_GET['course'] : die();
$product->name = isset($_GET['name']) ? $_GET['name'] : die();
$product->term = isset($_GET['term']) ? $_GET['term'] : die();

// make sure data is not empty
if(
    !empty($product->name) &&
    !empty($product->course) &&
    !empty($product->term) &&
    !empty($product->id_student)
){

    // create the product
    if($product->create()) {
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Product was created."));
    }
  
    // if unable to create the product, tell the user
    else {
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>