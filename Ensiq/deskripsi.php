<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "ensiqtest");
// if(isset($_POST["submit"])){
//     $q = "UPDATE entry SET 
//     jenis_id = $jenis_id,
//     judul = '$judul',
//     nama_latin = '$nama_latin',
//     daerah_asal = '$daerah_asal',
//     ciri_ciri = '$ciri_ciri',
//     deskipsi_singkat = '$deskipsi_singkat',
//     link_gambar = '$link_gambar'
//     WHERE entry_id = $entry_id";
    
// }
$id = $_GET["id"];
// echo $id;
$result = mysqli_query($db, "SELECT * FROM entry WHERE entry_id = $id");
$e = mysqli_fetch_assoc($result);
$jenis_id = $e["jenis_id"];

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
        background-color: #d0c895;
    }

    .navbar {
        display: flex;
        align-items: center;
        justify-content: center;
        position: static;
        top: 0;
        min-width: 100%;
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

    .nav-list li #ed {
        display: block;
        font-family: helvetica;
        font-weight: 600;
        font-size: 20px;
        text-decoration: none;
        text-transform: capitalize;
        margin-left: 5px;
        margin-inline: 14px;
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

    #ed {
        text-decoration: none;
        display: inline;
        padding: 8px 16px;
        background-color: black;
        border-radius: 10px;
    }

    .col-3 {
        max-width: 500px;
        padding-right: 20px;
        padding-left: 20px;
        display: flex;
        align-items: center;
    }

    .col-3>.col-3-padding {
        box-sizing: border-box;
        padding: 30px 0px 30px 0px;
    }

    #Table1 {
        border: 3px solid #82878d;
        border-radius: 7px;
        background-color: #F8F9FA;
        border-spacing: 10px;
        margin-top: 0px;
        margin-left: 485px;
        margin-right: 465px;
        background-color: #d0c895;
    }

    #Table1 td {
        padding: 10px 10px 10px 10px;
    }

    #Table1 p,
    #Table1 ul {
        margin: 0;
        padding: 0px;
    }

    #Table1 .cell0 {
        border-top-width: 7px;
        border-right-width: 8px;
        border-bottom-width: 6px;
        border-left-width: 7px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: #F8F9FA;
        border-right-color: #F8F9FA;
        border-bottom-color: #F8F9FA;
        border-left-color: #F8F9FA;
        text-align: center;
        vertical-align: top;
        font-size: 0;
        border-color: #d0c895;
    }

    #Table1 .cell1 {
        border-bottom-width: 10px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: #F8F9FA;
        border-right-color: #F8F9FA;
        border-bottom-color: #F8F9FA;
        border-left-color: #F8F9FA;
        text-align: center;
        text-transform: capitalize;
        vertical-align: top;
        color: #000000;
        font-family: lucida;
        font-size: 50px;
        line-height: 20px;
        border-color: #d0c895;
    }

    #Table1 .cell2 {
        border-top-width: 0px;
        border-right-width: 8px;
        border-bottom-width: 0px;
        border-left-width: 7px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: #F8F9FA;
        border-right-color: #F8F9FA;
        border-bottom-color: #F8F9FA;
        border-left-color: #F8F9FA;
        text-align: left;
        vertical-align: top;
        color: #000000;
        font-family: Arial;
        font-size: 17px;
        line-height: 19px;
        border-color: #d0c895;
        font-style: bold;
    }

    #latin {
        text-transform: lowercase;
    }

    #latin::first-letter {
        text-transform: uppercase;
    }

    #asal {
        text-transform: capitalize;
    }

    #further::first-letter {
        text-transform: uppercase;
    }

    #image {
        width: 450px;
        height: 280px;
    }
    </style>
</head>

<body>
    <nav class="navbar">
        <ul class="nav-list">
            <?php if($jenis_id == 1): ?>
            <li>
                <a id="nv" href="indexhewan.php" class="previous">&laquo; Back</a>
            </li>
            <?php elseif ($jenis_id == 2): ?>
            <li>
                <a id="nv" href="indextumbuhan.php" class="previous">&laquo; Back</a>
            </li>
            <?php elseif ($jenis_id == 3): ?>
            <li>
                <a id="nv" href="indexjamur.php" class="previous">&laquo; Back</a>
            </li>
            <?php endif; ?>




            <?php  if (isset($_SESSION["login"])) :?>
            <li>
                <a id="ed" href="edit.php?entry_id=<?= $id; ?>">Edit Data</a>
            </li>
            <li>
                <a id="ed" href="hapus.php?id=<?= $id; ?>"
                    onclick="return confirm('Apakah Anda yakin menghapus data ini?');">Hapus</a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="col-3">

        <div class="col-3-padding">

            <table id="Table1">

                <tr>
                    <td colspan="2" class="cell0">
                        <div>
                            <img src="Gambar/<?= $e["link_gambar"] ?>" id="image" alt="">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="cell1">
                        <p><span>
                                <?= $e["judul"]; ?>
                            </span></p>
                    </td>
                </tr>

                <tr>
                    <td class="cell2">
                        <p> <span>Nama Latin</span></p>
                    </td>
                    <td id="latin" class="cell2">
                        <p><i>
                                <?= $e["nama_latin"]; ?>
                            </i></p>
                    </td>
                </tr>

                <tr>
                    <td class="cell2">
                        <p> <span>Daerah Asal</span></p>
                    </td>
                    <td id="asal" class="cell2">
                        <p>
                            <?= $e["daerah_asal"]; ?>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td class="cell2">
                        <p><span></span>Ciri-ciri</p>
                    </td>
                    <td id="further" class="cell2">
                        <p align="justify">
                            <?= $e["ciri_ciri"]; ?>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td class="cell2">
                        <p><span></span>Deskripsi Singkat</p>
                    </td>
                    <td id="further" class="cell2">
                        <p align="justify">
                            <?= $e["deskipsi_singkat"]; ?>
                        </p>
                    </td>
                </tr>

            </table>
        </div>
    </div>
    </div>
    </div>
    </form>
</body>

</html>