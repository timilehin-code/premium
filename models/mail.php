<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require '../vendor/autoload.php';

// loading .env file
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__. '\..');
$dotenv->load();
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {
    $code = rand(1111, 9999);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = $_ENV['EMAILHOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = $_ENV['EMAILUSERNAME'];                     //SMTP username
        $mail->Password = $_ENV['EMAILPASSWORD'];                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = $_ENV['EMAILPORT'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($_ENV['EMAILUSERNAME'], 'Oluwatimilehin');
        $mail->addAddress($_POST['userEmail']);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('no-reply@oluwatimilehintawose2005.com', "no-reply");




        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your OTP';
        $mail->Body = "<!DOCTYPE html>
                        <html lang='en'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        </head>
                        <body style='margin: 0px;padding: 0px;font-family:sans-serif; background-color: #f2f2f2;color: #212B36;  font-style: italic;font-weight: 300;height:auto'><br><br>
                            <div style='width: 260px;height: auto;  background-color: #fff; padding: 30px; margin: auto;padding: 30px;''>
                                <br><br>
                                <div style='margin-bottom: 20px;'>
                                    <p style='font-size:14px;'>Your one time password for premium is </p>
                                    <p style='font-size:27px;'>$code</p>
                                     <p style='font-size:14px;'>If you didn't request for this code, please ignore this message</p>
                                </div>
                                <br><br>
                            </div><br><br>
                        </body>
                        </html>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}