<?php

function OpenCon(){
 $dbhost = "127.0.0.1";
 $dbuser = "245136@localhost";
 $dbpass = "unifesp2006";
 $db = "245136";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
     
    
       
?>