<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: loginme.php");
    exit;
}
require 'functions.php';



if (isset($_POST["submit"])) {
    //cek data berhasil diubah atau tidak
    if(ubah($_POST) > 0){
        // echo "Data Berhasil diubah";
        echo "
            <script>
               alert('data berhasil diubah!');
               document.location.href = 'index.php';

            //    location.href = 'http://localhost/san/';
            </script>
        ";
        exit;
    } else {
        echo "
        <script>
           alert('data gagal diubah!');
           document.location.href = 'index.php';
        // location.href = 'http://localhost/san/';
        </script>
    ";
        exit;  
    }
    // var_dump($_GET["id"]);  
}

if (isset($_GET["entry_id"]) && !isset($_POST["submit"])) {
    //ambil data
    $entry_id = $_GET["entry_id"]; 
    $q = "SELECT * FROM entry WHERE entry_id = $entry_id";
    $hasil = query($q);

    $jenis_id = $hasil[0]["jenis_id"];
    $judul = $hasil[0]["judul"];
    $nama_latin = $hasil[0]["nama_latin"];
    $daerah_asal = $hasil[0]["daerah_asal"];
    $ciri_ciri = $hasil[0]["ciri_ciri"];
    $deskipsi_singkat = $hasil[0]["deskipsi_singkat"];
    $link_gambar = $hasil[0]["link_gambar"];
}
 else {
    if(!isset($_GET["entry_id"])){
    echo "error";
    exit;}
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry EnsiQ</title>
    <link rel="eq.png" href="Gambar/eq.png">
    <link rel="icon" type="image/x-icon" href="Gambar/eq.png">
    <style>
    #te {
        font-family: georgia;
        font-size: 50px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: capitalize;
        margin-left: 30px;
        margin-top: 35px;
        margin-bottom: 30px;
        align-text: center;
    }

    #li {
        font-family: Arial;
        font-size: 20px;
        letter-spacing: 1px;
        margin-left: 35px;
        margin-top: 20px;
    }

    #lii {
        font-family: Arial;
        font-size: 16px;
        letter-spacing: 10px;
    }

    #select {
        padding: 2px;
        font-family: Arial;
        font-size: 16px;
        letter-spacing: 1px;
        border: 1.5px solid black;
        border-radius: 4px;
        cursor: pointer;
    }

    #input {
        padding: 2px;
        font-family: Arial;
        font-size: 16px;
        letter-spacing: 1px;
        border: 1.5px solid black;
        border-radius: 4px;
    }

    #linkg {
        padding: 2px;
        font-family: Arial;
        font-size: 16px;
        letter-spacing: 1px;
        border: 1.5px solid white;
        border-radius: 4px;
    }

    #button {
        padding: 4px;
        font-family: Arial;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 1px;
        border: 2px solid black;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <h1 id="te">Edit Data Ini</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value='<?= $_GET["entry_id"]; ?>' name="entry_id">
        <input type="hidden" value='<?= $link_gambar; ?>' name="link_gambar_lama">
        <ul>
            <li id="li">
                <label for="jenis_id">Jenis Makhluk Hidup: </label>
                <select id="select" id="jenis_id" name="jenis_id">
                    <?php if ($jenis_id == 1): ?>
                    <option id="lii" value="1" selected>Hewan</option>
                    <?php else: ?>
                    <option id="lii" value="1">Hewan</option>
                    <?php endif; ?>

                    <?php if ($jenis_id == 2): ?>
                    <option id="lii" value="2" selected>Tumbuhan</option>
                    <?php else: ?>
                    <option id="lii" value="2">Tumbuhan</option>
                    <?php endif; ?>

                    <?php if ($jenis_id == 3): ?>
                    <option id="lii" value="3" selected>Jamur</option>
                    <?php else: ?>
                    <option id="lii" value="3">Jamur</option>
                    <?php endif; ?>




                    <!-- <option value="audi">Audi</option> -->
                </select>
            </li>

            <li id="li">
                <label for="judul">Judul :</label>
                <input id="input" type="text" name="judul" id="judul" value="<?= $judul; ?>" required>
            </li>

            <li id="li">
                <label for="nama_latin">Nama Latin :</label>
                <input id="input" type="text" name="nama_latin" id="nama_latin" value="<?= $nama_latin; ?>" required>
            </li>

            <li id="li">
                <label for="daerah_asal">Daerah Asal :</label>
                <input id="input" type="text" name="daerah_asal" id="daerah_asal" value="<?= $daerah_asal; ?>" required>
            </li>

            <li id="li">
                <label for="ciri_ciri">Ciri-Ciri :</label>
                <input id="input" type="text" name="ciri_ciri" id="ciri_ciri" value="<?= $ciri_ciri; ?>" required>
            </li>

            <li id="li">
                <label for="deskipsi_singkat">Deskripsi Singkat :</label>
                <input id="input" type="text" name="deskipsi_singkat" id="deskipsi_singkat"
                    value="<?= $deskipsi_singkat; ?>" required>
            </li>

            <li id="li">
                <label for="link_gambar">Gambar :</label> <br>
                <img src="Gambar/<?= $link_gambar; ?>" width="200"> <br>
                <input id="linkg" type="file" name="link_gambar" id="link_gambar">
            </li>

            <li id="li">
                <button id="button" type="submit" name="submit">Edit Data!</button>
            </li>

        </ul>

    </form>

</body>

</html>