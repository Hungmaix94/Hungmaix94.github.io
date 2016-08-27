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
        require __DIR__.'/PHPMailer/PHPMailerAutoload.php';
    }

    public function verify($data){
//        echo"<pre>"; var_dump(); echo "</pre>";exit();
        $email = strip_tags(htmlspecialchars($data['email']));
        $confirmed = strip_tags(htmlspecialchars($data['confirmed']));
        $confirm_code = strip_tags(htmlspecialchars($data['confirm_code']));
        if($confirmed == "0"){
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
            $mail->setFrom( "spdoan@gmail.com", "Techmaster support");
            $mail->addAddress($email,"chew chew");
            $mail->isHTML(true);
            $mail->Subject = "VERIFY EMAIL:";
            $mail->Body = "<p>"."Bạn vừa luôc rau?, nếu đúng hãy click vào đây để xác thực "."<a href=".BASE_PATH."/admin/register/verify/".$confirm_code.">".BASE_PATH."/admin/register/verify/".$confirm_code."</a>"."</p>";
            $mail->AltBody = "This is the plain text version of the email content";
            header("Location:".BASE_PATH."/admin/login/view");
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message has been sent successfully";
            }

        }else{
            header("Location:".BASE_PATH."/admin/login/view");
        }

    }
}