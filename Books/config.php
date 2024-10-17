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


function insertBook($book_name,$book_author,$language){
    $this->initConnection();
        
    $query = "INSERT INTO books(book_name,book_author,language) VALUES ('$book_name','$book_author','$language');";
    
    $res = mysqli_query($this->conn,$query);
    
    return $res;
}

function fetchAllBook(){

    $this->initConnection();

    $query="SELECT * FROM books";
    $res=mysqli_query($this->conn,$query);
return $res;
}
function fetchBook($id){
    $this->initConnection();

    $query = "SELECT * FROM books WHERE id=$id;";

    $res = mysqli_query($this->conn,$query);

    return $res;
}


function deleteBook($id){
    $this->initConnection();
    
    $query="DELETE FROM books WHERE id=$id;";
    $res=mysqli_query($this->conn,$query);
    return $res;
    
    }
    
    function updateBook($book_name,$book_author,$language,$id){
        $this->initConnection();
        
        $query="UPDATE books SET book_name='$book_name',book_author='$book_auhtor',language='$language' WHERE id=$id;";
        $res=mysqli_query($this->conn,$query);
        return $res;
        }
    
}


?>