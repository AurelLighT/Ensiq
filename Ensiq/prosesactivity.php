<?php
session_start();
// $email = $_SESSION["email"];
date_default_timezone_set('Asia/Jakarta');
$s =date('l, jS \of F Y h:i:s A');
echo $s;

require "functions.php";


?>