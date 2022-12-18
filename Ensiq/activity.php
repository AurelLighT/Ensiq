<?php
session_start();
require 'functions.php';

$result = query("SELECT user.full_name as full_name,user.email as email, activity.time as time FROM activity,user WHERE activity.user_id = user.user_id ORDER BY activity_id DESC ");

// foreach ($result as $e){
//     var_dump($e);
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
    table {
        max-width: 1000px;
    }

    .center {
        margin-left: auto;
        margin-right: auto;
    }

    th {
        text-align: left;
        font-family: georgia;
        font-size: large;
    }

    h1 {
        text-align: center;
        margin-top: 50px;
        margin-bottom: 40px;
        font-family: trebuchet MS;
        font-size: 50px;
    }

    table,
    th,
    td {
        border: 1px solid #000;
        border-collapse: collapse;
    }

    th {
        padding: 13px;
    }

    td {

        padding: 10px;
    }

    tr:nth-child(even) {
        background-color: #e1e1e1;
    }

    #fn {
        width: 120px;
    }

    #em {
        width: 200px;
    }

    #ed {
        width: 400px;
    }

    #dt {
        width: 200px;
    }
    </style>
</head>

<body>
    <table class="center">
        <h1>Log In Admin</h1>
        <tr>
            <th id="fn">Full Name</th>
            <th id="em">Email</th>
            <!-- <th id="ed">Edit</th> -->
            <th id="dt">Date Time</th>
        </tr>

        <?php foreach($result as $e): ?>
        <tr>
            <td><?= $e["full_name"] ?></td>
            <td><?= $e["email"] ?></td>
            <td><?= $e["time"] ?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>