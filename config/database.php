
<?php

$server   = "http://34.207.124.213";
$username = "root";
$password = "ganaderia";
$database = "gestionganadera";


$mysqli = new mysqli($server, $username, $password, $database);


if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}
?>