<?php
 require_once("../connexionDB.php");
require_once("../fonctions.php");
session_start();

$validationErrors = array();
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if(isset($_POST['fullname'])&&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['cne'])&&isset($_POST['pwd'])&&isset($_POST['pwd1'])){
        // if(!empty($_POST['fullname']) && !empty($_POST['phone'])&& !empty($_POST['email'])&& !empty($_POST['cne'])&& !empty($_POST['pwd']) && empty($_POST['pwd1']) ){

            // $qr=htmlspecialchars($_POST['qrcode']) ; 
          
            $fullname = htmlspecialchars($_POST['fullname']) ; 
            $phone=htmlspecialchars($_POST['phone']);
            $email =htmlspecialchars( $_POST['email']);
            $cne = htmlspecialchars($_POST['cne']);
            $pwd = htmlspecialchars($_POST['pwd']);
            $pwd1 = htmlspecialchars($_POST['pwd1']);
            $qr="http://api.qrserver.com/v1/create-qr-code/?data=$fullname&size=500x500";
            $now=strtotime("now");
            $created=date("Y-m-d H:i:s", $now+3600);


            $sql="INSERT INTO users(fullname,phone,email,cne,password,qrcode,role_id,timein)  VALUES( '$fullname','$phone','$email','$cne',MD5('$pwd'),'$qr',2,'$created')";
    
            if($conn->query($sql)){
              echo 'Bon inscription';
             }else{
               echo 'samthing is worng';
             }
      }else{
        echo 'champs est vide ';
      }
    }





  
  //   $nomPhoto = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
  //   $imageTemp = $_FILES['photo']['tmp_name'];
  //   move_uploaded_file($imageTemp, "../img/utilisateurs/" . $nomPhoto);
  // if (isset($cne)) {
  //   $filtredLogin = filter_var($cne, FILTER_SANITIZE_STRING);
  //   if (strlen($filtredLogin) < 4) {
  //     $validationErrors[] = " Le login doit contenir au moins 4 caratères !";
  //   }
  // }
  // if (isset($pwd1) && isset($pwd2)) {
  //   if (empty($pwd1)) {
  //     $validationErrors[] = " Le mot ne doit pas etre vide !";
  //   }
  //   if (md5($pwd1) !== md5($pwd2)) {
  //     $validationErrors[] = "Les deux mot de passe ne sont pas identiques !";
  //   }
  // }
  // if (isset($email)) {
  //   $filtredEmail = filter_var($login, FILTER_SANITIZE_EMAIL);
  //   if ($filtredEmail != true) {
  //     $validationErrors[] = " Email  non valid !";
  //   }
  // }

   
     

      
      

//   if (empty($validationErrors)) {
//     if (rechercher_par_login($cne) == 0 & rechercher_par_email($email) == 0) {

//       $success_msg = "Le compte est crée, avec succès !";
//     } else {
//       if (rechercher_par_login($cne) > 0) {
//         $validationErrors[] = 'Désolé le login exsite deja';
//       }
//       if (rechercher_par_email($email) > 0) {
//         $validationErrors[] = 'Désolé cet email exsite deja';
//       }
    
// }