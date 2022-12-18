<?php
session_start();




if(isset($_SESSION["login"])){
    header("Location: index.php");
}
require 'functions.php';
if( isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($db, "SELECT * FROM user WHERE email = '$email' ");
    // $e = mysqli_fetch_assoc($result);
    // var_dump($e);
    // cek email

    if(mysqli_num_rows($result) == 1){
        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            // set session
            // $_SESSION["email"] = $email;
            $_SESSION["login"] = true;
            $time =date('l, jS \of F Y h:i:s A');
            $result = mysqli_query($db, "SELECT user_id FROM user WHERE email = '$email' ");
            $e = mysqli_fetch_assoc($result);
            $user_id = $e["user_id"];
            

            $query = "INSERT INTO activity VALUES 
            ('' , '$user_id' , '$time')";
            // $query = "INSERT INTO `activity`(`activity_id`, `user_id`, `time`) VALUES ('','$user_id','$time')";
            mysqli_query($db, $query);
           
            // cek remember me
            if(isset($_POST["remember"])){


                setcookie('id', $row['user_id'], time() + 60*60*24);
                setcookie('key', hash('sha256', $row['email']), time() + 60*60*24);
                // setcookie('login', 'true', time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;

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
        border: solid rgb(255, 255, 255);
        width: 40%;
        align-content: center;
        margin-top: 5%;
        margin-left: 30%;
    }

    #li {
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
        font-size: 15px;
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
        .loginbtn {
            width: 100%;
        }
    }

    #tdk {
        font-family: sans-serif;
        font-style: italic;
        font-size: 30px;
        color: red;
        text-align: center;
        margin-top: 50px;
        margin-bottom: -30px;
    }
    </style>
</head>

<body>
    <?php if(isset($error)): ?>
    <p id="tdk">Username atau Password salah</p>

    <?php endif; ?>
    <form action="" method="post" style="border:1px solid #ccc">
        <div class="container">
            <h1 id="li">Login</h1>
            <br>
            <br>
            <br>
            <label for="email">
                <b id="e">Email</b>
            </label>
            <br>
            <input type="text" placeholder="Enter Email" name="email" required>
            <br>
            <label for="pw">
                <b id="pw">Password</b>
            </label>
            <br>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br>

            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
            <div class="clearfix">
                <button type="submit" name="login" class="loginbutton">Login</button>
            </div>
        </div>
    </form>
</body>

</html>