<?php  session_start(); ?>
<html>

<head>
    <script type%="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>
  
    <div class="container"> 
        
        <div class="row">
            <div class="col-md-6">
                
                    <h4>Scanner un code QR</h4>
                    <video id="preview" width="70%"></video>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "
                            <div class='alert alert-danger'> <h5>Error !</h5>".$_SESSION['error']."</div>
                            ";
                        }
                        if(isset($_SESSION['success'])){
                            echo "
                            <div class='alert alert-primary'> <h5>Success!</h5>".$_SESSION['success']."</div>
                            ";
                        }
                    ?>
                
                
            </div>
            <div class="col-md-6">
            <form action="insert.php" method="post" class='form-horizontal'>
                <h4>User</h4>
                <input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control" style="display:none;">
                
            </from>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Full Name</td>
                        <td>Time in</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $conn = new mysqli("localhost","root","","qrcode_db");
                    if($conn->connect_error){
                        die("Connection failed" .$conn->connect_error);
                    }
                        $sql = "select * from users ";  
                        $query=$conn->query($sql);
                        while($row = $query->fetch_assoc()){
                            ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['fullname'] ?></td>
                            <td><?php echo $row['timein'] ?></td>
                        </tr>
                            <?php

                        }
                    ?>
                </tbody>

            </table>
                
            </div>
        </div>
    </div> 
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found ');
            }
        }).catch(function (e) {
            console.error(e);
        });

        scanner.addListener('scan',function(c){
         document.getElementById('text').value=c;
         document.forms[0].submit();
    });
    </script>
</body>

</html>