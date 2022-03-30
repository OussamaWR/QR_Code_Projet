<?php 
require_once("connexionBD.php");

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