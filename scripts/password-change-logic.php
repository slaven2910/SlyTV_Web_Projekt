<?php
// idea from: https://www.youtube.com/watch?v=wUkKCMEYj9M

if (isset($_POST["selector"]) && isset($_POST["validator"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["pwd-repeat"];

    if (empty($pwd)) {
        header("Location: password-change.php?error=new password is empty");
        exit();
    } else if (empty($pwdRepeat)) {
        header("Location: password-change.php?error=please repeat the new password");
        exit();
    }

    $currentDateTime = date("U");

    require_once 'db-connect/dbConnection.php';

    $query = "SELECT * FROM public.\"pwdReset\" WHERE selector='$selector' AND expires >= $currentDateTime";
    $queryResult = executeSQL($query);

    if ($queryResult->rowCount() === 1) {
        $row = $queryResult->fetch(PDO::FETCH_ASSOC);

        $tokenBinary = hex2bin($validator);
        $checkToken = password_verify($tokenBinary, $row["token"]);

        if ($checkToken) {
            $tokenEmail = $row["email"];

            $selectEmail = "SELECT * FROM public.\"Users\" WHERE email='$tokenEmail'";
            $result = executeSQL($selectEmail);
            if ($result->rowCount() === 1) {

                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                $updatePwd = "UPDATE public.\"Users\" SET password='$hashedPwd' WHERE email='$tokenEmail'";
                executeSQL($updatePwd);

                $deleteToken = "DELETE FROM public.\"pwdReset\" WHERE email='$tokenEmail'";
                executeSQL($deleteToken);

                header("Location: login.php?success=password has been reset successfully!");
                exit();
            } else {
                header("Location: passwordReset.php?error=something went wrong");
                exit();
            }
        } else {
            header("Location: passwordReset.php?error=wrong token! Maybe you didn't copy the whole URL?");
            exit();
        }
    } else {
        header("Location: passwordReset.php?error=token expired");
        exit();
    }
}
