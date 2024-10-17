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


function insertBorrowedDetail($book_name,$borrower_name,$borrower_date,$id){
    $this->initConnection();
        
    $query = "INSERT INTO borrowings(book_name,borrower_name,borrower_date,id) VALUES ('$book_name','$borrower_name',$borrower_date,$id);";
    
    $res = mysqli_query($this->conn,$query);
    
    return $res;
}

function fetchAllBorrowedDetails(){

    $this->initConnection();

    $query="SELECT * FROM borrowings";
    $res=mysqli_query($this->conn,$query);
return $res;
}
function fetchBorrowedDetails($id){
    $this->initConnection();

    $query = "SELECT * FROM borrowings WHERE id=$id;";

    $res = mysqli_query($this->conn,$query);

    return $res;
}


function deleteBorrowedDetails($id){
    $this->initConnection();
    
    $query="DELETE FROM borrowings WHERE id=$id;";
    $res=mysqli_query($this->conn,$query);
    return $res;
    
    }
    
    function updateBorrowedDetails($book_name,$borrower_name,$borrower_date,$id){
        $this->initConnection();
        
        $query="UPDATE borrowings SET book_name='$book_name',borrower_name='$borrower_name',borrower_id=$borrower_date WHERE id=$id;";
        $res=mysqli_query($this->conn,$query);
        return $res;
        
        }
    
}


?>