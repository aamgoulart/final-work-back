<?php
class Student{
  
    // database connection and table name
    private $conn;
  
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

    // create product       
    function create(){
  
        // query to insert record
        $query = "INSERT INTO student(id_student, name, course, term) VALUES ($1, $2, $3, $4);";

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->course=htmlspecialchars(strip_tags($this->course));
        $this->term=htmlspecialchars(strip_tags($this->term));
        $this->id_student=htmlspecialchars(strip_tags($this->id_student));

        $parans = array (
            "id_student" => $this->id_student,
            "name" => $this->name,
            "course" => $this->course,
            "term" => $this-> term
        );

        $result = pg_query_params($this->conn, $query, $parans);

        if($result){
            return true;
        }
        return false;

    }
}
?>