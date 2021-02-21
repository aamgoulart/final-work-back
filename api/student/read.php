<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/student.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$product = new Student($db);
  
// read products will be here
$stmt = $product->read();

    if ($stmt == null) {
        http_response_code(404);
    } else {
        http_response_code(200);

    }

  
    echo json_encode($stmt);

?>