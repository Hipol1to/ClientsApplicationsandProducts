<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer.php');
require('SMTP.php');
require('Exception.php');

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'soporte@inversioneseverest.net';                     //SMTP username
    $mail->Password   = '!!zU7543Mjk!!';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('soporte@inversioneseverest.net', 'Mailer');
    $mail->addAddress('cuentacompaltidas@gmail.com');               //Name is optional
   /*  $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient */
   /*   */
   /*  $mail->addReplyTo('info@example.com', 'Information'); */
   /*  $mail->addCC('cc@example.com'); */
   /*  $mail->addBCC('bcc@example.com'); */

   /*  //Attachments */
   /*  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments */
   /*  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name */

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'olmagare';
    $mail->Body    = 'brocompai <b>holy shitvrolet!</b>';
    $mail->AltBody = 'for real';

    $mail->send();
    error_log("Message has been sent");
} catch (Exception $e) {
    error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
}