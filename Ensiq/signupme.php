<?php
require 'functions.php';
    if(isset($_POST["register"])){

        if(registrasi($_POST) > 0) {
        echo "<script>
                    alert('user baru berhasil ditambahkan!');
                    </script>";
        } else {
        // echo mysqli_error($conn);
        }
    }

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>EnsiQ</title>
    <link rel="eq.png" href="Gambar/eq.png">
    <link rel="icon" type="image/x-icon" href="Gambar/eq.png">
    <style>
    form {
        border: solid white;
        width: 40%;
        align-content: center;
        margin-top: 5%;
        margin-left: 30%;
    }

    #si {
        color: rgb(255, 255, 255);
        font-family: Georgia;
        background-color: #04AA6D;
        padding: 15px;
        margin-bottom: 15px;
        text-align: center;
    }

    * {
        box-sizing: border-box;
    }

    input[type=text],
    input[type=password] {
        display: inline-block;
        border: none;
        background: #bfbfbf;
        width: 100%;
        padding: 10px;
        margin: 7px 4px 30px 1px;
    }

    #fn {
        margin: 2px;
        font-family: georgia;
    }

    #e {
        margin: 2px;
        font-family: georgia;
    }

    #pw {
        margin: 2px;
        font-family: georgia;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    button {
        font-family: tahoma;
        background-color: #0022cb;
        color: white;
        padding: 13px 30px;
        margin: 20px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 1;
        box-sizing: border-box;
    }

    button:hover {
        opacity: 0.8;
    }

    .container {
        padding: 20px;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    @media screen and (max-width: 300px) {
        .signupbtn {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <form action="" method="post" style="border:1px solid #ccc">
        <div class="container">
            <h1 id="si">Sign Up</h1>
            <br>
            <br>
            <br>
            <label for="full_name">
                <b id="fn">Full Name</b>
            </label>
            <input type="text" placeholder="Enter Full Name" name="full_name" id="full_name" required>
            <br>
            <label for="email">
                <b id="e">Email</b>
            </label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
            <br>
            <label for="password">
                <b id="pw">Password</b>
            </label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <br>
            <label for="password2">
                <b id="pw">Confirm Password</b>
            </label>
            <input type="password" placeholder="Enter Password" name="password2" id="password2" required>

            <div class="clearfix">
                <button type="submit" name="register" class="signupbutton">Sign In</button>
            </div>
        </div>
    </form>
</body>

</html>