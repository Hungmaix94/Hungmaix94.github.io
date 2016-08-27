<?php

/**
 * Created by PhpStorm.
 * User: I_am_Po
 * Date: 8/24/2016
 * Time: 4:05 PM
 */
class Mail
{
    function __construct()
    {
        require __DIR__ . '/PHPMailer/PHPMailerAutoload.php';
    }
    public function verify($email,$confirmed,$confirm_code)
    {
        if ($confirmed == "0") {
            $mail = new PHPMailer();
            $mail->SMTPDebug = 3;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "laravel.tech11@gmail.com";
            $mail->Password = "nghia1993";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->CharSet = "utf8";
            $mail->setFrom("spdoan@gmail.com", "Techmaster support");
            $mail->addAddress($email, "chew chew");
            $mail->isHTML(true);
            $mail->Subject = "VERIFY EMAIL:";
            $mail->Body = "<p>" . "Bạn vừa luôc rau?, nếu đúng hãy click vào đây để xác thực " . "<a href=" . BASE_PATH . "/admin/register/verify/" . $confirm_code . ">" . BASE_PATH . "/admin/register/verify/" . $confirm_code . "</a>" . "</p>";
            $mail->AltBody = "This is the plain text version of the email content";
            header("Location:" . BASE_PATH . "/admin/login/view");
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message has been sent successfully";
            }

        } else {
            header("Location:" . BASE_PATH . "/admin/login/view");
        }

    }

    public function resetPass($email,$confirm_code)
    {
       
            $mail = new PHPMailer();
            $mail->SMTPDebug = 3;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "laravel.tech11@gmail.com";
            $mail->Password = "nghia1993";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->CharSet = "utf8";
            $mail->setFrom("spdoan@gmail.com", "Techmaster support");
            $mail->addAddress($email, "chew chew");
            $mail->isHTML(true);
            $mail->Subject = "VERIFY EMAIL:";
            $mail->Body = "<p>" . "Bạn vừa  " . "<a href=" . BASE_PATH . "/admin/password/reset/" . $confirm_code . ">" . BASE_PATH . "/admin/password/reset/" . $confirm_code . "</a>" . "</p>";
            $mail->AltBody = "This is the plain text version of the email content";
             header("Location:" . BASE_PATH . "/admin/login/");
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message has been sent successfully";

            }

     
    }
}