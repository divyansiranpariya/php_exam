<?php
class Config{

    private $HOST_NAME='127.0.0.1';
    private $USER_NAME="root";
    private $PASSWORD="";
    private $DB_NAME="library";
    public $conn;
    
    function initConnection(){
        $this->conn=mysqli_connect($this->HOST_NAME,$this->USER_NAME,$this->PASSWORD,$this->DB_NAME);
        if(!$this->conn){
           die("database connection failed...");
    }
}


function insertStudentDetail($age,$course,$borrower_id){
    $this->initConnection();
        
    $query = "INSERT INTO students(age,course,borrower_id) VALUES ($age,'$course',$borrower_id);";
    
    $res = mysqli_query($this->conn,$query);
    
    return $res;
}

function fetchAllStudentDetail(){

    $this->initConnection();

    $query="SELECT * FROM students";
    $res=mysqli_query($this->conn,$query);
return $res;
}
function fetchStudentDetail($id){
    $this->initConnection();

    $query = "SELECT * FROM students WHERE student_id=$id;";

    $res = mysqli_query($this->conn,$query);

    return $res;
}


function deleteStudentDetail($id){
    $this->initConnection();
    
    $query="DELETE FROM students WHERE student_id=$id;";
    $res=mysqli_query($this->conn,$query);
    return $res;
    
    }
    
    function updateStudentDetail($age,$course,$id){
        $this->initConnection();
        
        $query="UPDATE students SET age=$age,course='$course' WHERE student_id=$id;";
        $res=mysqli_query($this->conn,$query);
        return $res;
        }
    
}


?>