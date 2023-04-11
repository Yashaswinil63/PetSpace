<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

        function send_mail($recipient, $subject, $message) {

            $mail = new PHPMailer();
            $mail->IsSMTP();

            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->Host = "smtp.gmail.com";
            //$mail->Host       = "smtp.mail.yahoo.com";
            $mail->Username = "yashaswini.l632002@gmail.com";
            $mail->Password = "vfjgmkqdqvybqvic";

            $mail->IsHTML(true);
            $mail->AddAddress($recipient, "recipient-name");
            $mail->SetFrom("yashaswini.l632002@gmail.com", "Yashaswini");
            //$mail->AddReplyTo("reply-to-email", "reply-to-name");
            //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
            $mail->Subject = $subject;
            $content = $message;

            $mail->MsgHTML($content);
            if (!$mail->Send()) {
                //echo "Error while sending Email.";
                //var_dump($mail);
                return false;
            } else {
                //echo "Email sent successfully";
                return true;
            }
        }
        ?>
    </body>
</html>
