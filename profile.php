<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>profile</title>
    <link rel="stylesheet" href="styleH.css">
</head>

<body>


    <header>
        <i>
            <h1><a href="#">HOME</a></h1>
        </i>
    </header>

    <div class="tout">
        <div class="Name">
            <h1>Bienvenue <?php $_SESSION['user']  ?> </h1>
        </div>

        <div class="scanner">
            <div class="title">
                <h2>Scan Qr Code</h2>
            </div>
            <div class='qrcode'>
                <?php

                require_once("connexionDB.php");


                $email = $_SESSION['user']['email'];


                $sql = "SELECT * from users ";

                $query = $conn->query($sql);
              
                // output data of each row
                //if ($query) {
                    $photo = $query["qrcode"];
                    echo "<br>  <img src='$photo' alt='oussama' id='exp'> <br>";
                //}




                ?>
            </div>

        </div>

        <!-- <img src="exp.jpeg" alt="image" id="exp">
    <img src="fleche.jpeg" alt="image" id="fleche"> -->


        <div id="methode">
            <h3 class="meth">Pour scanner le code, Veuillez:</h3>
            <br>
            -Ouvrir l’appareil photo.<br>
            -Pointer la caméra (arrière) vers le QR Code.<br>
            -Lorsque celui-ci est reconnu, une notification s’affiche à l’écran.<br>

        </div>

    </div>



</body>

</html>