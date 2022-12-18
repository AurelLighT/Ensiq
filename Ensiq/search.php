<?php
require 'functions.php';

$result = query("SELECT * FROM entry");

// echo "a";
$nomor = 0;
// while ($e = mysqli_fetch_assoc($result)) {
//     echo $e["judul"];
//     echo "<br>";
// }

if(isset($_POST["cari"])){
    $result = cari($_POST["keyword"]);
}


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
        background-color: #e4c0a8;
        height: 193px;
        min-width: 1400px;
    }

    .satu {
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
        max-width: 200%;
        margin: auto;
        height: 85%;
    }

    #eta {
        font-family: serif;
        font-size: 80px;
        font-weight: 450;
        letter-spacing: 2px;
        text-transform: capitalize;
        text-align: center;
        margin-top: 40px;
        margin-bottom: 10px;
    }

    #search {
        padding: 6px;
        font-size: 14px;
        border: 2px solid black;
        border-radius: 6px;
        margin-left: 120px;
    }

    #button {
        padding: 6px 20px;
        font-size: 14px;
        margin: 7px 0;
        border: 2px solid white;
        border-radius: 7px;
        background-color: black;
        color: white;
        cursor: pointer;
    }

    .fototumbuhan {
        height: 100%;
        display: flex;
        align-items: top;
        justify-content: center;
        min-width: 1400px;
        min-height: 487px;
        margin: auto;
        background-color: #e4c0a8;
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

    #temu {
        font-family: sans-serif;
        font-size: 30px;
        font-weight: 600;
    }
    </style>
</head>

<body>

    <nav class="navbar">
        <ul class="nav-list">
            <li>
                <a id="nv" href="index.php" class="previous">&laquo; Back</a>
            </li>
            <li>
                <a id="td" href="create.php">Tambah Data</a>
            </li>
        </ul>
    </nav>

    <section class="ensitumbuhan">
        <div class="satu">
            <div class="inti">
                <h1 class="text-big" id="eta">Apa yang anda cari?</h1>
                <br>
                <form action="" method="post">
                    <div class="keyword">
                        <input id="search" type="text" name="keyword" size="50" autofocus
                            placeholder="Masukkan Judul yang Ingin Anda Cari" autocomplete="off" class="keyword">
                        <button id="button" type="submit" name="cari">Cari!</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="fototumbuhan">
        <div class="thumbnail">
            <br>
            <?php if (count($result)==0): ?>
            <h1 id="temu">DATA TIDAK DITEMUKAN</h1>
            <?php endif; ?>
            <?php foreach ($result as $e): ?>
            <?php if ($nomor % 3 == 0 && $nomor != 0): ?>
            <br>
            <br>
            <br>
            <?php endif;
                $nomor++; ?>



            <a href="deskripsi.php?id=<?= $e["entry_id"] ?>">
                <img src="Gambar/<?= $e["link_gambar"]; ?>" alt="<?= $e["judul"]; ?>" name="Gambar">
            </a>



            <?php endforeach; ?>

        </div>
    </section>
</body>

</html>