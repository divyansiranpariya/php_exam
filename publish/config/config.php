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


function insertPublishDetails($publisher_name,$book_name,$id){
    $this->initConnection();
        
    $query = "INSERT INTO publish(publisher_name,book_name,id) VALUES ('$publisher_name','$book_name',$id);";
    
    $res = mysqli_query($this->conn,$query);
    
    return $res;
}

function fetchAllPublishDetails(){

    $this->initConnection();

    $query="SELECT * FROM publish";
    $res=mysqli_query($this->conn,$query);
return $res;
}
function fetchPublishDetails($id){
    $this->initConnection();

    $query = "SELECT * FROM publish WHERE publish_id=$id;";

    $res = mysqli_query($this->conn,$query);

    return $res;
}


function deletePublishDetails($id){
    $this->initConnection();
    
    $query="DELETE FROM publish WHERE publish_id=$id;";
    $res=mysqli_query($this->conn,$query);
    return $res;
    
    }
    
    function updatePublishDetails($publisher_name,$book_name){
        $this->initConnection();
        
        $query="UPDATE publish SET publisher_name='$publisher_name,book_name='$bookname' WHERE publish_id=$id;";
        $res=mysqli_query($this->conn,$query);
        return $res;
        }
    
}


?>