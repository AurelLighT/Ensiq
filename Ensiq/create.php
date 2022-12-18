<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: loginme.php");
    exit;
}
require 'functions.php';

if (isset($_POST["submit"])) {

    // cek data berhasil ditambahkan atau tidak
    if(tambah($_POST) > 0){
        // echo "Data Berhasil Ditambahkan";

        echo "
            <script>
               alert('data berhasil ditambahkan!');
               document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
        <script>
           alert('data gagal ditambahkan!');
           document.location.href = 'index.php';
        </script>
    ";
        exit;  
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Entry EnsiQ</title>
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
    <h1 id="te">Tambah Entry</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li id="li">
                <label for="jenis_id">Jenis Makhluk Hidup: </label>
                <select id="select" id="jenis_id" name="jenis_id">
                    <option id="lii" value="1">Hewan</option>
                    <option id="lii" value="2">Tumbuhan</option>
                    <option id="lii" value="3">Jamur</option>
                    <!-- <option value="audi">Audi</option> -->
                </select>
            </li>

            <li id="li">
                <label for="judul">Judul :</label>
                <input id="input" type="text" name="judul" id="judul" required>
            </li>

            <li id="li">
                <label for="nama_latin">Nama Latin :</label>
                <input id="input" type="text" name="nama_latin" id="nama_latin" required>
            </li>

            <li id="li">
                <label for="daerah_asal">Daerah Asal :</label>
                <input id="input" type="text" name="daerah_asal" id="daerah_asal" required>
            </li>

            <li id="li">
                <label for="ciri_ciri">Ciri-Ciri :</label>
                <input id="input" type="text" name="ciri_ciri" id="ciri_ciri" required>
            </li>

            <li id="li">
                <label for="deskipsi_singkat">Deskripsi Singkat :</label>
                <input id="input" type="text" name="deskipsi_singkat" id="deskipsi_singkat" required>
            </li>

            <li id="li">
                <label for="link_gambar">Gambar :</label>
                <input id="linkg" type="file" name="link_gambar" id="link_gambar">
            </li>

            <li id="li">
                <button id="button" type="submit" name="submit">Tambah Data!</button>
            </li>

        </ul>

    </form>

</body>

</html>