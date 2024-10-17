<?php
include '../../config/config.php';

header("Access-Control-Allow-Methods:POST");  
header("Content-Type:application/json");      
if($_SERVER['REQUEST_METHOD']=='POST'){        

    $book_name=$_POST['book_name'];
    $borrower_name=$_POST['borrower_name'];
    $borrower_date=$_POST['borrower_date'];
    $id=$_POST['id'];

    $config=new Config();
    $res=$config->insertBorrowedDetail($book_name, $borrower_name, $borrower_date,$id);


    
if($res){
  $arr['data']="BorrowedDetails inserted successfully..";
}else{
    $arr['data']="BorrowedDetails inserted failed..";
}

}
else{
    $arr['error']="Only POST http request method is allowed...";
}


echo json_encode($arr);

?>