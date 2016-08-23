<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/13/2016
 * Time: 10:53 AM
 */
class mailto_controller extends  base_controller
{
    function view()
    {

        if (empty($_POST['Mailfrom'])||
            empty($_POST['Mailto']) ||
            empty($_POST['subject']) ||
            empty($_POST['Message']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        ) {
            echo "No arguments Provided!";
            return false;
        }

        $Mailfrom = strip_tags(htmlspecialchars($_POST['Mailfrom']));
        $Mailto = strip_tags(htmlspecialchars($_POST['Mailto']));
        $subject = strip_tags(htmlspecialchars($_POST['subject']));
        $Message = strip_tags(htmlspecialchars($_POST['Message']));
        $mail = new PHPMailer();
        $mail->SMTPDebug = 3;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();
        //Set SMTP host name
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        //Provide username and password
        $mail->Username = $Mailfrom;
        $mail->Password = $Password;
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
        //Set TCP port to connect to
        $mail->Port = 587;
        $mail->CharSet = "utf8";
        $mail->setFrom($Mailfrom, "Techmaster support");
        $mail->addAddress($Mailto," ");
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "<p>" . $Message . "</p>";
        $mail->AltBody = "This is the plain text version of the email content";
//        header("Location: ".BASE_PATH."/admin/");

//        if (!$mail->send()) {
//            echo "Mailer Error: " . $mail->ErrorInfo;
//        } else {
//            echo "Message has been sent successfully";
//        }

    }
}