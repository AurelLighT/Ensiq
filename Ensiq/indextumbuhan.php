<?php
session_start();
// if(isset($_COOKIE['login'])){
//     if($_COOKIE['login'] == 'true'){
//         $_SESSION['login'] = true;
        
//     }
// }
require 'functions.php';

$result = query("SELECT * FROM entry where jenis_id = 2");

// echo "a";
$nomor = 0;
// while ($e = mysqli_fetch_assoc($result)) {
//     echo $e["judul"];
//     echo "<br>";
// }

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>EnsiQ</title>
    <link rel="eq.png" href="Gambar/eq.png">
    <link rel="icon" type="image/x-icon" href="Gambar/eq.png">
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    .navbar {
        display: flex;
        align-items: center;
        justify-content: center;
        position: static;
        top: 0;
        width: 100%;
        background-color: rgb(255, 255, 255);
    }

    .nav-list {
        width: 100%;
        display: flex;
        align-items: left;
    }

    .nav-list li {
        list-style: none;
        padding: 17px 17px;
    }

    .nav-list li #nv {
        display: block;
        font-family: helvetica;
        font-weight: 600;
        font-size: 20px;
        text-decoration: none;
        text-transform: uppercase;
        margin-left: 5px;
        color: rgb(0, 0, 0);
        position: static;
    }

    .nav-list li #td {
        display: block;
        font-family: helvetica;
        font-weight: 600;
        font-size: 20px;
        text-decoration: none;
        text-transform: capitalize;
        margin-left: 5px;
        color: rgb(255, 255, 255);
    }

    .nav-list li #nv:hover {
        color: rgb(47, 0, 255);
    }

    #nv {
        text-decoration: none;
        display: inline;
        padding: 8px 16px;
        border-radius: 10px;
    }

    #nv:hover {
        background-color: #ddd;
        color: black;
    }

    .previous {
        color: black;
    }

    #td {
        text-decoration: none;
        display: inline;
        padding: 8px 16px;
        background-color: black;
        border-radius: 10px;
    }

    .ensitumbuhan {
        background-color: #c9a7a6;
        height: 165px;
        min-width: 1400px;
    }

    .satu {
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
        max-width: 105%;
        margin: auto;
        height: 85%;
    }

    #eta {
        font-family: helvetica;
        font-size: 80px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: capitalize;
        text-align: center;
        margin-top: 40px;
    }

    .fototumbuhan {
        height: 100%;
        display: flex;
        align-items: top;
        justify-content: center;
        min-width: 1400px;
        min-height: 515px;
        margin: auto;
        background-color: #c9a7a6;
    }

    .thumbnail img {
        width: 250px;
        border: 4px solid #85644d;
        border-radius: 10px;
        margin-top: 0px;
        margin-inline: 38px;
        margin-bottom: 12px;
        width: 380px;
        height: 280px;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <nav class="navbar">
        <ul class="nav-list">
            <li>
                <a id="nv" href="index.php" class="previous">&laquo; Back</a>
            </li>
            <?php  if (isset($_SESSION["login"])) :?>
            <li>
                <a id="td" href="create.php">Tambah Data</a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>

    <section class="ensitumbuhan">
        <div class="satu">
            <div class="inti">
                <h1 class="text-big" id="eta">Ensiklopedia Tumbuhan</h1>
            </div>
        </div>
    </section>

    <section class="fototumbuhan">
        <div class="thumbnail">
            <br>

            <?php foreach ($result as $e): ?>
            <?php if ($nomor % 3 == 0 && $nomor != 0): ?>
            <br>
            <br>
            <br>
            <?php endif;
                $nomor++; ?>

            <!-- <?php if ($e["jenis_id"] == 2): ?> -->

            <!-- <form action="deskripsi.php" method="post"> -->
            <a href="deskripsi.php?id=<?= $e["entry_id"] ?>">
                <img src="Gambar/<?= $e["link_gambar"]; ?>" alt="<?= $e["judul"]; ?>" name="Gambar">
            </a>
            <!-- </form> -->
            <!-- <?php else:
                    continue;
                endif; ?> -->


            <?php endforeach; ?>

        </div>
    </section>
</body>

</html>