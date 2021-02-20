<?php
// require "bootstrap.php";
// use Src\Controller\StudentController;
$db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=dbkij3sfomg5mf user=lybhospqqudnuy password=9ab37317d12919bdfdd3c607c3f02d3ec7f6cf8875137033c447502f3316112c");

if ($db_handle) {

echo 'Connection attempt succeeded.';

} else {

echo 'Connection attempt failed.';

}

pg_close($db_handle);

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $uri = explode( '/', $uri );

// // all of our endpoints start with /person
// // everything else results in a 404 Not Found
// if ($uri[1] !== 'person') {
//     header("HTTP/1.1 404 Not Found");
//     exit();
// }

// // the user id is, of course, optional and must be a number:
// $userId = null;
// if (isset($uri[2])) {
//     $userId = (int) $uri[2];
// }

// $requestMethod = $_SERVER["REQUEST_METHOD"];

// // pass the request method and user ID to the PersonController and process the HTTP request:
// $controller = new StudentController($dbConnection, $requestMethod, $userId);
// $controller->processRequest();
?>
