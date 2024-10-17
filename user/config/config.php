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

function signUpUser($userName,$password){
    $this->initConnection();
            
    $query = "SELECT * FROM users WHERE username='$userName'";
    $result = mysqli_query($this->conn, $query);

    if ($result == false) {
        return false;
    }

    $raw_count = mysqli_num_rows($result);
    if ($raw_count == 0) {
        $q = "INSERT INTO users (username, password) VALUES ('$userName', '$password')";
        $res = mysqli_query($this->conn, $q);
        
        if ($res == false) {
            return false; 
        }
        return true;
    } else {
        return false;
    }

    function signInUser($userName,$password){
        $this->initConnection();


        $q="SELECT * FROM users WHERE username='$userName';";
        $obj=mysqli_query($this->conn,$q);
        $row_count=mysqli_num_rows($obj);
        if($row_count==1){
        $record=mysqli_fetch_assoc($obj);
        $isPasswordVerified=password_verify($password,$record['password']);
        if($isPasswordVerifed){
return true;
        }
        else{
            return false;
        }
    }
}

}


function fetchAllUsers(){

    $this->initConnection();

    $query="SELECT * FROM users";
    $res=mysqli_query($this->conn,$query);
return $res;
}


function deleteUser($id){
$this->initConnection();

$query="DELETE FROM users WHERE id=$id;";
$res=mysqli_query($this->conn,$query);
return $res;

}

function updatePassword($password,$id){
    $this->initConnection();
    
    $query="UPDATE users SET password='$password' WHERE id=$id;";
    $res=mysqli_query($this->conn,$query);
    return $res;
    
    }

}
?>