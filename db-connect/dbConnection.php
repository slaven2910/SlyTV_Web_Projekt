<?php
function executeSQL(String $query) : PDOStatement {
    $host = "localhost";
    $port = "5432";
    $db = "SlyTV";
    $user = "postgres";
    $pw = "aspire938";
    $connStr = "pgsql:host=$host;port=$port;dbname=$db;";
    $dbConnection = new PDO($connStr, $user, $pw);
    return $dbConnection->query($query);
}

?>