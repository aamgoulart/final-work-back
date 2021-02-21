<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/accounts.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$product = new Accounts($db);
  
// set ID property of record to read
$product->email = isset($_GET['email']) ? $_GET['email'] : die();
$product->password = isset($_GET['password']) ? $_GET['password'] : die();
  
// read the details of product to be edited
// $product->readOne();

$stmt = $product->verify($product->email, $product->password);

    if ($stmt == null) {
        echo json_encode(array("message" => "Person dont have access"));

        http_response_code(404);
    } else {
        http_response_code(200);
        echo json_encode(array("message" => "Person have access"));

    }


?>