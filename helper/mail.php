<?php
header('Content-Type: text/html; charset=utf-8');
function maill($tenNguoinhan,$emailNguoinhan,$subject,$content){
    include_once('mailer/PHPMailer.php');
    include_once('mailer/Exception.php');
    
    //Load composer's autoloader
    //require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'duyvuong4455@gmail.com';                 // SMTP username
        $mail->Password = 'nam581997';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('namnguyenbh97@gmail.com', 'ADMIN');
        $mail->addAddress($emailNguoinhan,$tenNguoinhan);     // Add a recipient
        //$mail->addAddress('duc.huu128@gmail.com');               // Name is optional
        $mail->addReplyTo('namnguyenbh97@gmail.com', 'ADMIN');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('http://toplist.vn/images/800px/hoa-hong-10476.jpg');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
    
        $mail->Body    = $content;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    }
    catch (Exception $e) {
        // echo $e;
        return false;
    }
}




