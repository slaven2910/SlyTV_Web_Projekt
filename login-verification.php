<?php
session_start();
// change to original database information
require_once 'db-connect/dbConnection.php';
if (isset($_POST["eMail"]) && isset($_POST["password"])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $eMail = validate($_POST["eMail"]);
    $pwd = validate($_POST["password"]);

    if (empty($eMail)) {
        header("Location: login.php?error=E-Mail is required");
        exit();
    } else if (empty($pwd)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $query = "SELECT * FROM public.\"Users\" WHERE email='$eMail'";

        $queryResult = executeSQL($query);

        if ($queryResult->rowCount() === 1) {
            $row = $queryResult->fetch(PDO::FETCH_ASSOC);

            // password hashing for security reasons --> https://www.php.net/manual/de/faq.passwords.php
            $hashedPwd = $row["password"];

            if ($row["email"] === $eMail && password_verify($pwd, $hashedPwd)) {
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["logged_in"] = true;
                
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect E-Mail or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Either E-Mail or password is incorrect");
            exit();
        }
    }
} else {
    header("Location: login.php");
    exit();
}
