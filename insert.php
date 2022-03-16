<?php 
session_start();
$server="localhost";
$username='root';
$password="";
$dbname="qrcode_db";

    $conn = new mysqli($server,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed" .$conn->connect_error);
}

if(isset($_POST['text'])){
    $text = $_POST['text'];
    $sql = "insert into users(fullname,timein) values('$text',NOW())";
    if($conn->query($sql)===true){
       $_SESSION['success']='Attendance added successfully';
    }else{
        $_SESSION['error']=$conn->error;
    }
    header("location: index.php");
}
    $conn->close();

?>