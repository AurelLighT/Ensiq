<?php
require 'functions.php';
session_start();
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

   // ambil username berdasarkan id
   $result  = mysqli_query($db,"SELECT email FROM user WHERE user_id = $id ");
   $row = mysqli_fetch_assoc($result);

   // cek cookie dan username
   if($key === hash('sha256',$row['email'])){
        $_SESSION['login'] = true;
   }
}
// var_dump($_SESSION);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>EnsiQ</title>
    <link rel="eq.png" href="Gambar/eq.png">
    <link rel="icon" type="image/x-icon" href="Gambar/eq.png">
    <link href="bm.css" rel="stylesheet">
    <link rel="stylesheet" href="hp.css">
</head>

<body>
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.5s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">

                        <a class="logo"></a>

                        <ul class="nav">
                            <?php  if (isset($_SESSION["login"])) :?>
                            <li><a href="activity.php">Activity</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                            <li><a href="signupme.php">Sign Up</a></li>
                            <?php endif; ?>
                            <?php  if (!isset($_SESSION["login"])) :?>
                            <li><a href="loginme.php">Login</a></li>
                            <?php endif; ?>
                            <li>
                                <div class="main-white-button"><a href="search.php">Search</a></div>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="top-text header-text">
                        <h6>EnsiQ</h6>
                        <h2>Millions of Years of Earth's Evolutions,</h2>
                        <h2>All in Your Hand</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="plane">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="eq_bax text_align_center">
                        <a href="indexhewan.php">
                            <figure><img src="Gambar/cheetah.png" alt="Foto Hewan" /></figure>
                        </a>
                        <div class="eq_text">
                            <h3>HEWAN</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="eq_bax text_align_center">
                        <a href="indextumbuhan.php">
                            <figure><img src="Gambar/rafflesia.jpg" alt="Foto Tumbuhan" /></figure>
                        </a>
                        <div class="eq_text">
                            <h3>TUMBUHAN</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="eq_bax text_align_center">
                        <a href="indexjamur.php">
                            <figure><img src="Gambar/jamur.png" alt="Foto Jamur" /></figure>
                        </a>
                        <div class="eq_text">
                            <h3>JAMUR</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="qj.js"></script>
    <script src="cs.js"></script>

</body>

</html>