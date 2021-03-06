<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/student.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$product = new Student($db);
  
// set ID property of record to read
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// read the details of product to be edited
// $product->readOne();

$stmt = $product->readOne($product->id);

    if ($stmt == null) {
        echo json_encode(array("message" => "Product does not exist."));

        http_response_code(404);
    } else {
        http_response_code(200);
        echo json_encode($stmt);

    }


?>