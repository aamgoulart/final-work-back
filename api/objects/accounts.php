<?php
 
class Accounts {

    // database connection and table name
    private $conn;
  
     // object properties
    public $user_id;
    public $nickname;
    public $email;
    public $password;

    public function __construct($db){
        $this->conn = $db;
    }

    function verify($email, $password){
    
        // query to read single record
        $query = "SELECT 
            *
        FROM
            accounts
        WHERE email = $1 AND password =$2;
    ";

        $parans = array (
            "email" => $email,
            "password" => $password
        );


        // execute query
        $result = pg_query_params($this->conn, $query, $parans);
    
        // get retrieved row
        $row = pg_fetch_all($result);

        return $row;
    }



}
?>