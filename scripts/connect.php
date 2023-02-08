<?php
include 'db-credientials.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Datenbankverbindung aufbauen

$connStr = "host=$host port=$port dbname=$db user=$user password=$pw";

$dbConn = pg_connect($connStr);
date_default_timezone_set('Europe/Berlin');

if (!$dbConn) {
  echo "Ein Fehler ist aufgetreten.\n";
  exit;
}


?>