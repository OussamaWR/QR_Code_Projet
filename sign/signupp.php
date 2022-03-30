<?php  session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>sign up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="wrapper">
        <div id="title"> Create New Account</div>
        <form method="POST" action="signup.php">
            <div class="form" >

                <div class="input_field">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="input" id="fullname">
                </div>

                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="Phone" name="phone" class="input" id='numbre'>
                </div>

                <div class="input_field">
                    <label>Email</label>
                    <input type="Email" name="email" class="email">
                </div>

                <div class="input_field">
                    <label>CNE</label>
                    <input type="text" name="cne" class="cne">
                </div>

                <div class="input_field">
                    <label>passeword</label>
                    <input type="password" name="pwd" class="pwd">
                </div>

                <div class="input_field">
                    <label>confirm passeword</label>
                    <input type="password" name="pwd1"  class="pwd1">
                </div>
                <!-- <div class="input_field">
                    <input type="text"  id="qr" name='qrcode' class="crcode" style="display:none;">
                </div> -->

                    <!-- <img src="classic.png" alt="test" id="img" style="width: 300px; height: 300px;"/>                 -->
                <!-- <div class="input_field">
                    <button type="submit" value="Sign up" class="btn" >Sign Up</button>
                </div>
                -->
                <div class="input_field">
                 <button  id="btn1"  type="submit"  class="btn" style="text-align: center;text-decoration: none;"> Sign Up </button>
                 </div>
            </div>
        </form>
    </div>



<!-- 
    <script>
        function select(el) {
            return document.getElementById(el);
        }
        let qr = select("qr");
        // let qrcode = select("img");
        let qrtext = select("fullname");
        let qrbtn = select("btn");
        // qrbtn.addEventlistener("click", );
        function generateQR() {
            let size = "1000x1000";
            let data = qrtext.value;
            let baseURL = "http://api.qrserver.com/v1/create-qr-code/";
            let url = `${baseURL}?data=${data}&size=${size}`;
            qr.value=url;
            // qrcode.src = url;
            // btn1.href=url;
            document.forms[0].submit();
        }
    
    
    </script> -->
</body>


</html>