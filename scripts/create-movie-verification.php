<?php
include 'connect.php';

if (!$dbConn) {
    echo "Ein Fehler ist aufgetreten.\n";
    exit;
}

$title = $_POST["title"];
$publishingyear = $_POST["publishingyear"];
$genre = $_POST["genre"];
$plot = $_POST["plot"];
$actors = $_POST["actors"];
// weiß nicht was da übergeben wird
$image = $_POST["image"];


// Hier kommt die restliche Logik hin
$query = "";



// ganz am Ende, wenn alles funktioniert das ausführen:
// header("Location: ../index.php");
// exit();

?>