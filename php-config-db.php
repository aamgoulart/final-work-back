<?php

function OpenCon(){
 $dbhost = "localhost";
 $dbuser = "245136";
 $dbpass = "unifesp2006";
 $db = "245136@localhost";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
     
    
       
?>