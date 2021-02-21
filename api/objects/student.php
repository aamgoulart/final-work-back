<?php
class Student{
  
    // database connection and table name
    private $conn;
    private $table_name = "student";
  
    // object properties
    public $id_student;
    public $name;
    public $course;
    public $term;

  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
    
        // select all query
        $query = "SELECT *
                  FROM student;";
    
        try {
            $result = pg_query($this->conn, $query);

            if  (!$result) {
                echo "query did not execute";
            }
            if (pg_num_rows($result) == 0) {
                echo "0 records";
            }

            $arr = pg_fetch_all($result);
            return $arr;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    
    }
}
?>