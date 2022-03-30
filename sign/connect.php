<?php
  session_start();
  require_once("../connexionDB.php");
// Check The Type Request Is Post Not Get
  if(isset($_SERVER['REQUEST_METHOD']) == "POST") {
   // After Click Botton Submit
    if(isset($_POST['save'])) {
     $login = $_POST['login'];
     $pwd=$_POST['pwd'];
     // check Input Is Empty Or Not Empty
     if(empty($login) || empty($pwd)) {
       echo "Completez vos champs !!";
       // Check Email Is Email Or No 
     }else { 
       // Check The Info 
       $requete = "SELECT * FROM users WHERE email='$login' and password=MD5('$pwd')";
       $resultat=$conn->query($requete);
       if($user = $resultat->fetch()){
        if($user['role_id']==2){
            
            $_SESSION['user']=$user;
            header('location:../profile.php');
            
        }else{
            
          $_SESSION['admin']=$user;
          header('location:../home.php');
        }
       }
       else {
          $_SESSION['erreurLogin']="<strong>Login ou mot de passe incorrect !!</strong>";
          header("Location:signin.php"); 
       }
     } 
   }
  }
?>