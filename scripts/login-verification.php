<?php
include 'connect.php';
session_start();

if (!$dbConn) {
    echo "Ein Fehler ist aufgetreten.\n";
    exit;
}

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
        header("Location: ../login.php?error=E-Mail is required");
        exit();
    } else if (empty($pwd)) {
        header("Location: ../login.php?error=Password is required");
        exit();
    } else {
        $query = "SELECT * FROM public.\"Users\" WHERE email='$eMail'";

        $queryResult = pg_query($dbConn, $query);

        if (pg_num_rows($queryResult) === 1) {
            $row = pg_fetch_assoc($queryResult);

            // password hashing for security reasons --> https://www.php.net/manual/de/faq.passwords.php
            $hashedPwd = $row["password"];

            if ($row["email"] === $eMail && password_verify($pwd, $hashedPwd)) {
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["logged_in"] = true;
                $movie_id = $_GET["movie_id"];
                if ($movie_id) {
                    header("Location: ../movie-reviews.php?movie_id=$movie_id");
                } else {
                    header("Location: ../index.php");
                }

                exit();
            } else {
                header("Location: ../login.php?error=Incorrect E-Mail or password");
                exit();
            }
        } else {
            header("Location: ../login.php?error=Either E-Mail or password is incorrect");
            exit();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
