<?php
require_once 'db-connect/dbConnection.php';

        $id = $_GET['id'];
        header("Location: movieDetails.php?id=$id");
        $commentId = $_GET['commentId'];
        $deleteLine = "DELETE FROM commentMock WHERE commentid = $commentId";
        $deleteMethod=executeSQL($deleteLine);
        return $deleteMethod;
        header("Location: movieDetails.php");
    
?>