
<?php
// inspired by "How To Create A Forgotten Password System In PHP | Password Recovery By Email In PHP | PHP Tutorial" from Dani Krossing
// on Youtube.com available at the URL: https://www.youtube.com/watch?v=wUkKCMEYj9M. last visited on 03.01.2023.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
require_once '../scripts/connect.php';
if (isset($_POST["eMail"])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $eMail = validate($_POST["eMail"]);

    if (empty($eMail)) {
        header("Location: ../passwordReset.php?error=E-Mail is required");
        exit();
    } else {

        $query = "SELECT email FROM public.\"Users\" WHERE email='$eMail'";
        $queryResult = pg_query($dbConn, $query);

        if (pg_num_rows($queryResult) === 1) {

            // token to authenticate user
            $selector = bin2hex(random_bytes(8));
            // token to pinpoint other token of the user for security reasons
            $token = random_bytes(32);

            $url = "http://localhost/SlyTV_Web_Projekt/password-change.php?selector=$selector&validator=" . bin2hex($token);

            // datetime right now + 450 seconds (20 min)
            $expires = date("U") + 450;

            $delete = "DELETE FROM public.\"pwdReset\" WHERE email='$eMail'";
            pg_query($dbConn, $delete);


            $hashedToken = password_hash($token, PASSWORD_DEFAULT);

            $insert = "INSERT INTO public.\"pwdReset\" (email, selector, token, expires)
                Values ('$eMail', '$selector', '$hashedToken', '$expires')";
            pg_query($dbConn, $insert);

            // would be changed to mail($to, $subject, $message, $header); when on webserver
            // PHPMailer from: https://github.com/PHPMailer/PHPMailer
            // code inspired by: https://www.codexworld.com/how-to-send-email-from-localhost-in-php/
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->SMTPDebug = 1;
            $mail->Host = 'ssl://smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            
            // had to be deleted due to scam attempts by people from Japan and Morocco 
            $mail->Username = 'deleted ;)';
            $mail->Password = 'jasdfjesdjejis';
            $mail->setFrom('StopScammingPeople@no-life.fy', 'deletedAlready');
            $mail->addReplyTo('StopScammingPeople@no-life.fy', 'deletedAlready');
            $mail->addAddress($eMail);

            $mail->isHTML(true);

            $mail->Subject = 'SlyTV | Resetting your password';

            $mail->Body = '<p>We recieved a password reset request. The following link will guide you to the password reset page: 
                <a href="' . $url . '">' . $url . '</a></p>.<br>Notice that this link will expire after 20 minutes and you will have
                to make another request to get a new link.<br>If you did not make this request, you can ignore this email';

            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                header("Location: ../passwordReset.php?success=an email has been sent to you.");
                exit();
            }
        } else {
            header("Location: ../passwordReset.php?error=E-Mail not found");
            exit();
        }
    }
} else {
    header("Location: /passwordReset.php");
    exit();
}
