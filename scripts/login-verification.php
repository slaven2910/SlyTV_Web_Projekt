
<?php
include 'connect.php';
/* session_start();
 */// inspried by "Complete User Registration system using PHP and MySQL database" from Coding with Elias on YouTube.com
// available at the URL: https://www.youtube.com/watch?v=QxZxHUf7c_0. last visited on 26.12.2023.
if (isset($_POST["eMail"]) && isset($_POST["password"])) {

    // removes unnecessary data and prevents cross-site scripting / character escape
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
        // keeps the typed in email in the input field
        header("Location: ../login.php?error=Password is required&email=$eMail");
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
                    exit();
                } else {
                    header("Location: ../index.php");
                    exit();
                }
                exit();
            } else {
                header("Location: ../login.php?error=Incorrect E-Mail or password&&email=$eMail");
                exit();
            }
        } else {
            header("Location: ../login.php?error=Either E-Mail or password is incorrect&email=$eMail");
            exit();
        }
    }
} else {
    header("Location: ../login.php");
    exit();
}
